<template>
  <div class="row">
    <div class="col-12">
      <div class="d-flex bd-highlight">
        <div class="p-2 flex-grow-1 bd-highlight"><h2>Transaksi</h2></div>
        <div class="p-2 bd-highlight">
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
          <transaksi-modal-add ref="addModal"></transaksi-modal-add>
          <upload-modal :url="'transaksi'" ref="uploadModal"></upload-modal>
        </div>
      </div>
    </div>

    <div class="col-12 mt-2">
      <card :title="'Daftar Transaksi'">
        <v-table
          :items="items"
          :itemsTitle="itemsTitle"
          :isAction="isRole('Admin')"
        >
          <template v-slot:action="action">
            <td>
              <dropdown name="Action">
                <li>
                  <a
                    type="button"
                    class="dropdown-item"
                    @click="
                      ($refs.transaksiModal.showModal = true),
                        ($refs.transaksiModal.transaksiId = action.data.id)
                    "
                  >
                    Lihat
                  </a>
                </li>
                <li>
                  <a
                    type="button"
                    class="dropdown-item"
                    @click="
                      ($refs.editModal.showModal = true),
                        $refs.editModal.setTransaksi(action.data)
                    "
                  >
                    Edit
                  </a>
                </li>
                <li>
                  <a
                    type="button"
                    class="dropdown-item"
                    @click="deleteTransaksi(action.data.id)"
                  >
                    Hapus
                  </a>
                </li>
              </dropdown>
            </td>
          </template>
        </v-table>
        <transaksi-modal-show ref="transaksiModal"></transaksi-modal-show>

        <transaksi-modal-edit ref="editModal"></transaksi-modal-edit>
      </card>
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import TransaksiModalAdd from "~/components/galon/TransaksiModalAdd";
import TransaksiModalShow from "~/components/galon/TransaksiModalShow";
import UploadModal from "~/components/galon/UploadModal";
import TransaksiModalEdit from "~/components/galon/TransaksiModalEdit";
import VTable from "~/components/VTable";
import Dropdown from "~/components/Dropdown";

import axios from "axios";

export default {
  middleware: "auth",
  components: {
    TransaksiModalAdd,
    TransaksiModalShow,
    TransaksiModalEdit,
    UploadModal,
    Dropdown,
    VTable,
  },
  computed: {
    ...mapGetters({
      transaksis: "transaksi/transaksis",
    }),
    items: function () {
      if (!this.loading && this.transaksis) {
        return this.transaksis.map(
          ({ id, tanggal, debit, kredit, keterangan, status, payer }) => {
            let payerNama = payer.nama
            return { id, payerNama, tanggal, debit, kredit, keterangan, status };
          }
        );
      }
    },
    itemsTitle: function () {
      return ["ID", "Nama", "Tangga", "Debit", "Kredit","Keterangan", "Status"];
    },
  },
  data() {
    return {
      loading: true,
    };
  },
  methods: {
    async deleteTransaksi(id) {
      const { data } = await axios.delete("api/transaksi/" + id);
      this.$store.commit("transaksi/deleteTransaksi", id);
    },
  },
  created() {
    this.$store.dispatch("transaksi/fetchTransaksis");
    this.loading = false;
  },
  metaInfo() {
    return { title: "Transaksi" };
  },
};
</script>
