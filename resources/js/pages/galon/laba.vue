<template>
  <div class="row">
    <div class="col-12"></div>

    <div class="col-12 mt-2">
      <card :title="'Daftar Laba'">
        <div class="d-flex bd-highlight">
          <div class="flex-grow-1 bd-highlight"><h4>Laba</h4></div>
          <div class="bd-highlight">
            <button
              class="btn btn-primary"
              v-if="isRole('Admin')"
              @click="$refs.editModal.showModal = true"
            >
              Take
            </button>
            <button
              class="btn btn-primary"
              v-if="isRole('Admin')"
              @click="$refs.uploadModal.showModal = true"
            >
              Import
            </button>
            <laba-modal-edit ref="editModal"></laba-modal-edit>
            <upload-modal :url="'laba'" ref="uploadModal"></upload-modal>
          </div>
        </div>
        {{ labas[0].nama }}
        {{ labas[0].total }}
        <v-table :items="items" :itemsTitle="itemsTitle"> </v-table>
        <laba-modal-show ref="labaModal"></laba-modal-show>
        <laba-modal-edit ref="editModal"></laba-modal-edit>
      </card>
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import LabaModalAdd from "~/components/galon/LabaModalAdd";
import LabaModalShow from "~/components/galon/LabaModalShow";
import UploadModal from "~/components/galon/UploadModal";
import LabaModalEdit from "~/components/galon/LabaModalEdit";
import VTable from "~/components/VTable";
import Dropdown from "~/components/Dropdown";

import axios from "axios";

export default {
  middleware: "auth",
  components: {
    LabaModalAdd,
    LabaModalShow,
    LabaModalEdit,
    UploadModal,
    Dropdown,
    VTable,
  },
  computed: {
    ...mapGetters({
      labas: "laba/labas",
    }),
    items: function () {
      let laba = this.labas[0].log.reverse();
      if (laba) {
        return laba.map(
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
    async deleteLaba(id) {
      const { data } = await axios.delete("api/laba/" + id);
      this.$store.commit("laba/deleteLaba", id);
    },
  },
  created() {
    this.$store.dispatch("laba/fetchLabas");
    this.loading = false;
  },
  metaInfo() {
    return { title: "Laba" };
  },
};
</script>
