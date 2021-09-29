<template>
  <div class="row">
    <div class="col-12">
      <div class="d-flex bd-highlight">
        <div class="p-2 flex-grow-1 bd-highlight"><h2>Piutang</h2></div>
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
          <piutang-modal-add ref="addModal"></piutang-modal-add>
          <upload-modal :url="'piutang'" ref="uploadModal"></upload-modal>
        </div>
      </div>
    </div>

    <div class="col-12 mt-2">
      <card :title="'Daftar Piutang'">
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
                      ($refs.piutangModal.showModal = true),
                        ($refs.piutangModal.item = action)
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
                        $refs.editModal.setPiutang(action.data)
                    "
                  >
                    Edit
                  </a>
                </li>
                <li>
                  <a
                    type="button"
                    class="dropdown-item"
                    @click="deletePiutang(action.data.id)"
                  >
                    Hapus
                  </a>
                </li>
              </dropdown>
            </td>
          </template>
        </v-table>
        <piutang-modal-show ref="piutangModal"></piutang-modal-show>

        <piutang-modal-edit ref="editModal"></piutang-modal-edit>
      </card>
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import PiutangModalAdd from "~/components/galon/PiutangModalAdd";
import PiutangModalShow from "~/components/galon/PiutangModalShow";
import UploadModal from "~/components/galon/UploadModal";
import PiutangModalEdit from "~/components/galon/PiutangModalEdit";
import VTable from "~/components/VTable";
import Dropdown from "~/components/Dropdown";

import axios from "axios";

export default {
  middleware: "auth",
  components: {
    PiutangModalAdd,
    PiutangModalShow,
    PiutangModalEdit,
    UploadModal,
    Dropdown,
    VTable,
  },
  computed: {
    ...mapGetters({
      piutangs: "piutang/piutangs",
    }),
    items: function () {
      if (!this.loading && this.piutangs) {
        return this.piutangs.map(
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
      loading: true,
    };
  },
  methods: {
    async deletePiutang(id) {
      const { data } = await axios.delete("api/piutang/" + id);
      this.$store.commit("piutang/deletePiutang", id);
    },
  },
  created() {
    this.$store.dispatch("piutang/fetchPiutangs");
    this.loading = false;
  },
  metaInfo() {
    return { title: "Piutang" };
  },
};
</script>
