<template>
  <div class="row">
    <div class="col-12">
      <div class="d-flex bd-highlight">
        <div class="p-2 flex-grow-1 bd-highlight"><h2>DetailTransaksi</h2></div>
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
          <detailTransaksi-modal-add ref="addModal"></detailTransaksi-modal-add>
          <upload-modal :url="'detailTransaksi'" ref="uploadModal"></upload-modal>
        </div>
      </div>
    </div>

    <div class="col-12 mt-2">
      <card :title="'Daftar DetailTransaksi'">
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
                      ($refs.detailTransaksiModal.showModal = true),
                        ($refs.detailTransaksiModal.item = action)
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
                        $refs.editModal.setDetailTransaksi(action.data)
                    "
                  >
                    Edit
                  </a>
                </li>
                <li>
                  <a
                    type="button"
                    class="dropdown-item"
                    @click="deleteDetailTransaksi(action.data.id)"
                  >
                    Hapus
                  </a>
                </li>
              </dropdown>
            </td>
          </template>
        </v-table>
        <detailTransaksi-modal-show ref="detailTransaksiModal"></detailTransaksi-modal-show>

        <detailTransaksi-modal-edit ref="editModal"></detailTransaksi-modal-edit>
      </card>
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import DetailTransaksiModalAdd from "~/components/galon/DetailTransaksiModalAdd";
import DetailTransaksiModalShow from "~/components/galon/DetailTransaksiModalShow";
import UploadModal from "~/components/galon/UploadModal";
import DetailTransaksiModalEdit from "~/components/galon/DetailTransaksiModalEdit";
import VTable from "~/components/VTable";
import Dropdown from "~/components/Dropdown";

import axios from "axios";

export default {
  middleware: "auth",
  components: {
    DetailTransaksiModalAdd,
    DetailTransaksiModalShow,
    DetailTransaksiModalEdit,
    UploadModal,
    Dropdown,
    VTable,
  },
  computed: {
    ...mapGetters({
      detailTransaksis: "detailTransaksi/detailTransaksis",
    }),
    items: function () {
      // if (!this.loading && this.detailTransaksis) {
      //   return this.detailTransaksis.map(
      //     ({ id, nama, harga_jual, harga_beli, jumlah, status }) => {
      //       return { id, nama, harga_jual, harga_beli, jumlah, status };
      //     }
      //   );
      // }
    },
    itemsTitle: function () {
      return ["ID", "Nama", "Harga Jual", "Harga Beli", "Jumlah", "Status"];
    },
  },
  data() {
    return {
      dataLihat: { id: 0, nama: "null", created_at: "tet", updated_at: "tet" },
      dataEdit: { id: 0, nama: "null", created_at: "tet", updated_at: "tet" },
      loading: true,
    };
  },
  methods: {
    async deleteDetailTransaksi(id) {
      const { data } = await axios.delete("api/detailTransaksi/" + id);
      this.$store.commit("detailTransaksi/deleteDetailTransaksi", id);
    },
  },
  created() {
    this.$store.dispatch("detailTransaksi/fetchDetailTransaksis");
    this.loading = false;
  },
  metaInfo() {
    return { title: "DetailTransaksi" };
  },
};
</script>
