<template>
  <div class="row">
    <div class="col-12">
      <div class="d-flex bd-highlight">
        <div class="p-2 flex-grow-1 bd-highlight"><h2>Utang</h2></div>
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
          <utang-modal-add ref="addModal"></utang-modal-add>
          <upload-modal :url="'utang'" ref="uploadModal"></upload-modal>
        </div>
      </div>
    </div>

    <div class="col-12 mt-2">
      <card :title="'Daftar Utang'">
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
                      ($refs.utangModal.showModal = true),
                        ($refs.utangModal.item = action)
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
                        $refs.editModal.setUtang(action.data)
                    "
                  >
                    Edit
                  </a>
                </li>
                <li>
                  <a
                    type="button"
                    class="dropdown-item"
                    @click="deleteUtang(action.data.id)"
                  >
                    Hapus
                  </a>
                </li>
              </dropdown>
            </td>
          </template>
        </v-table>
        <utang-modal-show ref="utangModal"></utang-modal-show>

        <utang-modal-edit ref="editModal"></utang-modal-edit>
      </card>
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import UtangModalAdd from "~/components/galon/UtangModalAdd";
import UtangModalShow from "~/components/galon/UtangModalShow";
import UploadModal from "~/components/galon/UploadModal";
import UtangModalEdit from "~/components/galon/UtangModalEdit";
import VTable from "~/components/VTable";
import Dropdown from "~/components/Dropdown";

import axios from "axios";

export default {
  middleware: "auth",
  components: {
    UtangModalAdd,
    UtangModalShow,
    UtangModalEdit,
    UploadModal,
    Dropdown,
    VTable,
  },
  computed: {
    ...mapGetters({
      utangs: "utang/utangs",
    }),
    items: function () {
      if (!this.loading && this.utangs) {
        return this.utangs.map(
          ({ id, payer,aset,payer_type, harga, jumlah, total,keterangan,status}) => {
            let nama = payer.nama;
            let aset_nama = aset.nama;
            harga = this.toCurrency(harga)
            total = this.toCurrency(total)
            return { id, nama,payer_type,aset_nama, harga, jumlah, total,keterangan ,status};
          }
        );
      }
    },
    itemsTitle: function () {
      return ["ID", "Nama", "Tipe","Aset", "Harga", "Jumlah","total", "Status","Keterangan"];
    },
  },
  data() {
    return {
      loading: true,
    };
  },
  methods: {
    async deleteUtang(id) {
      const { data } = await axios.delete("api/utang/" + id);
      this.$store.commit("utang/deleteUtang", id);
    },
  },
  created() {
    this.$store.dispatch("utang/fetchUtangs");
    this.loading = false;
  },
  metaInfo() {
    return { title: "Utang" };
  },
};
</script>
