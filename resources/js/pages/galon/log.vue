<template>
  <div class="row">
    <div class="col-12">
      <div class="d-flex bd-highlight">
        <div class="p-2 flex-grow-1 bd-highlight"><h2>Log</h2></div>
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
          <log-modal-add ref="addModal"></log-modal-add>
          <upload-modal :url="'log'" ref="uploadModal"></upload-modal>
        </div>
      </div>
    </div>

    <div class="col-12 mt-2">
      <card :title="'Daftar Log'">
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
                      ($refs.logModal.showModal = true),
                        ($refs.logModal.item = action)
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
                        $refs.editModal.setLog(action.data)
                    "
                  >
                    Edit
                  </a>
                </li>
                <li>
                  <a
                    type="button"
                    class="dropdown-item"
                    @click="deleteLog(action.data.id)"
                  >
                    Hapus
                  </a>
                </li>
              </dropdown>
            </td>
          </template>
        </v-table>
        <log-modal-show ref="logModal"></log-modal-show>

        <log-modal-edit ref="editModal"></log-modal-edit>
      </card>
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import LogModalAdd from "~/components/galon/LogModalAdd";
import LogModalShow from "~/components/galon/LogModalShow";
import UploadModal from "~/components/galon/UploadModal";
import LogModalEdit from "~/components/galon/LogModalEdit";
import VTable from "~/components/VTable";
import Dropdown from "~/components/Dropdown";

import axios from "axios";

export default {
  middleware: "auth",
  components: {
    LogModalAdd,
    LogModalShow,
    LogModalEdit,
    UploadModal,
    Dropdown,
    VTable,
  },
  computed: {
    ...mapGetters({
      logs: "log/logs",
    }),
    items: function () {
      if (!this.loading && this.logs) {
        return this.logs.map(
          ({ id, nama, harga_jual, harga_beli, jumlah, status }) => {
            harga_jual = this.toCurrency(harga_jual)
            harga_beli = this.toCurrency(harga_beli)
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
      loading: true,
    };
  },
  methods: {
    async deleteLog(id) {
      const { data } = await axios.delete("api/log/" + id);
      this.$store.commit("log/deleteLog", id);
    },
  },
  created() {
    this.$store.dispatch("log/fetchLogs");
    this.loading = false;
  },
  metaInfo() {
    return { title: "Log" };
  },
};
</script>
