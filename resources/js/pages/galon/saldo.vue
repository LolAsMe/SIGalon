<template>
  <div class="row">
    <div class="col-12">
      <div class="d-flex bd-highlight">
        <div class="p-2 flex-grow-1 bd-highlight"><h2>Saldo</h2></div>
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
          <saldo-modal-add ref="addModal"></saldo-modal-add>
          <upload-modal :url="'saldo'" ref="uploadModal"></upload-modal>
        </div>
      </div>
    </div>

    <div class="col-12 mt-2">
      <card :title="'Daftar Saldo'">
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
                      ($refs.saldoModal.showModal = true),
                        ($refs.saldoModal.item = action)
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
                        $refs.editModal.setSaldo(action.data)
                    "
                  >
                    Edit
                  </a>
                </li>
                <li>
                  <a
                    type="button"
                    class="dropdown-item"
                    @click="deleteSaldo(action.data.id)"
                  >
                    Hapus
                  </a>
                </li>
              </dropdown>
            </td>
          </template>
        </v-table>
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
      if (!this.loading && this.saldos) {
        return this.saldos.map(
          ({ id, nama, total }) => {
            total = this.toCurrency(total);
            return { id, nama, total };
          }
        );
      }
    },
    itemsTitle: function () {
      return ["ID", "Nama", "total"];
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
