<template>
  <div class="row">
    <div class="col-12">
      <div class="d-flex bd-highlight">
        <div class="p-2 flex-grow-1 bd-highlight"><h2>Aset</h2></div>
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
          <aset-modal-add ref="addModal"></aset-modal-add>
          <upload-modal :url="'aset'" ref="uploadModal"></upload-modal>
        </div>
      </div>
    </div>

    <div class="col-12 mt-2">
      <card :title="'Daftar Aset'">
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
                      ($refs.asetModal.showModal = true),
                        ($refs.asetModal.item = action)
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
                        $refs.editModal.setAset(action.data)
                    "
                  >
                    Edit
                  </a>
                </li>
                <li>
                  <a
                    type="button"
                    class="dropdown-item"
                    @click="deleteAset(action.data.id)"
                  >
                    Hapus
                  </a>
                </li>
              </dropdown>
            </td>
          </template>
        </v-table>
        <aset-modal-show ref="asetModal"></aset-modal-show>

        <aset-modal-edit ref="editModal"></aset-modal-edit>
      </card>
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import AsetModalAdd from "~/components/galon/AsetModalAdd";
import AsetModalShow from "~/components/galon/AsetModalShow";
import UploadModal from "~/components/galon/UploadModal";
import AsetModalEdit from "~/components/galon/AsetModalEdit";
import VTable from "~/components/VTable";
import Dropdown from "~/components/Dropdown";

import axios from "axios";

export default {
  middleware: "auth",
  components: {
    AsetModalAdd,
    AsetModalShow,
    AsetModalEdit,
    UploadModal,
    Dropdown,
    VTable,
  },
  computed: {
    ...mapGetters({
      asets: "aset/asets",
    }),
    items: function () {
      if (!this.loading && this.asets) {
        return this.asets.map(
          ({ id, nama, harga_jual, harga_beli, jumlah, status }) => {
            return { id, nama, harga_jual, harga_beli, jumlah, status };
          }
        );
      }
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
    async deleteAset(id) {
      const { data } = await axios.delete("api/aset/" + id);
      this.$store.commit("aset/deleteAset", id);
    },
  },
  created() {
    this.$store.dispatch("aset/fetchAsets");
    this.loading = false;
  },
  metaInfo() {
    return { title: "Aset" };
  },
};
</script>
