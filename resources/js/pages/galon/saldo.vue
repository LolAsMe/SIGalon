<template>
  <div class="row">
    <div class="col-12"></div>

    <div class="col-12 mt-2">
      <card :title="'Daftar Saldo'">
        <div class="d-flex bd-highlight">
          <div class="flex-grow-1 bd-highlight"><h5>Saldo</h5></div>
          <div class="bd-highlight">
            <button
              class="btn btn-primary"
              v-if="isRole('Admin')"
              @click="$refs.addModal.showModal = true"
            >
              Add
            </button>
            <button
              class="btn btn-primary"
              v-if="isRole('Admin')"
              @click="$refs.uploadModal.showModal = true"
            >
              Import
            </button>
            <saldo-modal-add ref="addModal"></saldo-modal-add>
            <upload-modal :url="'saldo'" ref="uploadModal"></upload-modal>
          </div>
        </div>
        {{ saldos[0].nama }}
        {{ toCurrency(saldos[0].total) }}
        <v-table :items="items" :itemsTitle="itemsTitle"> </v-table>
        <saldo-modal-show ref="saldoModal"></saldo-modal-show>
        <saldo-modal-edit ref="editModal"></saldo-modal-edit>
      </card>
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import SaldoModalAdd from "~/components/galon/SaldoModalAdd";
import SaldoModalShow from "~/components/galon/SaldoModalShow";
import UploadModal from "~/components/galon/UploadModal";
import SaldoModalEdit from "~/components/galon/SaldoModalEdit";
import VTable from "~/components/VTable";
import Dropdown from "~/components/Dropdown";

import axios from "axios";

export default {
  middleware: "auth",
  components: {
    SaldoModalAdd,
    SaldoModalShow,
    SaldoModalEdit,
    UploadModal,
    Dropdown,
    VTable,
  },
  computed: {
    ...mapGetters({
      saldos: "saldo/saldos",
    }),
    items: function () {
      if (this.saldos[0].log) {
        return this.saldos[0].log.map(
          ({ id, nama, tanggal, jumlah, debit, kredit, total, keterangan }) => {
            debit = this.toCurrency(debit);
            kredit = this.toCurrency(kredit);
            total = this.toCurrency(total);
            return {
              id,
              nama,
              tanggal,
              jumlah,
              debit,
              kredit,
              total,
              keterangan,
            };
          }
        );
      }
    },
    itemsTitle: function () {
      return [
        "ID",
        "Nama",
        "Tanggal",
        "Jumlah",
        "Debit",
        "Kredit",
        "Total",
        "Keterangan",
      ];
    },
  },
  data() {
    return {
      loading: true,
    };
  },
  methods: {
    async deleteSaldo(id) {
      const { data } = await axios.delete("api/saldo/" + id);
      this.$store.commit("saldo/deleteSaldo", id);
    },
  },
  created() {
    this.$store.dispatch("saldo/fetchSaldos");
    this.loading = false;
  },
  metaInfo() {
    return { title: "Saldo" };
  },
};
</script>
