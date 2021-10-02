<template>
  <div class="row">
    <div class="col">
      <div class="d-flex bd-highlight">
        <div class="p-2 flex-grow-1 bd-highlight"><h4>Dashboard</h4></div>
        <div class="p-2 bd-highlight">
          <button class="btn btn-primary btn-sm" v-if="isRole('Admin')">
            Payer
          </button>
        </div>
      </div>
    </div>

    <div class="col-12 mt-2">
      <card :title="'Dashboard'">
        <div class="row">
          <div class="col-6">
            <div class="row">
              <div class="col">
                <v-table
                  class="table table-sm align-middle"
                  :items="items"
                  :itemsTitle="itemsTitle"
                >
                </v-table>
              </div>
              <div class="col">
                <v-table
                  class="table table-sm align-middle"
                  :items="items"
                  :itemsTitle="itemsTitle"
                >
                </v-table>
              </div>
              <div class="col">
                <v-table
                  class="table table-sm align-middle"
                  :items="items"
                  :itemsTitle="itemsTitle"
                >
                </v-table>
              </div>
            </div>
          </div>
          <div class="col-6"></div>
        </div>
      </card>
    </div>
  </div>
</template>

<script>
// import axios from 'axios'
import { mapGetters } from "vuex";
import VTable from "~/components/VTable";
export default {
  middleware: "auth",
  computed: mapGetters({
    user: "auth/user",
  }),
  components: {
    VTable,
  },
  data() {
    return {
      loading: true,
    };
  },
  computed: {
    ...mapGetters({
      asets: "aset/asets",
    }),
    items: function () {
      if (!this.loading && this.asets) {
        return this.asets.map(
          ({ id, nama, harga_jual, harga_beli, jumlah }) => {
            return { id, nama, harga_jual, harga_beli, jumlah };
          }
        );
      }
    },
    itemsTitle: function () {
      return ["ID", "Nama", "Harga Jual", "Harga Beli", "Jumlah"];
    },
  },
  created() {
    this.$store.dispatch("aset/fetchAsets");
    this.loading = false;
  },

  metaInfo() {
    return { title: "Dashboard" };
  },
};
</script>
