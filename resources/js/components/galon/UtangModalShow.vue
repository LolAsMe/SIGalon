<template>
  <div v-if="showModal" @close="showModal = false">
    <h5 slot="header">Log Utang</h5>
    <div slot="body">
      <v-table :items="items" :itemsTitle="itemsTitle"> </v-table>
    </div>
  </div>
</template>

<script>

import VTable from "~/components/VTable";
export default {
  name: "UtangModalShow",
  props: {
    // item: { type: Object, default: null },
  },
  components: {
    VTable
  },
  computed: {
    utang: function () {
      let currAset = this.$store.getters["utang/utangs"].find(
        (utang) => utang.id === this.utangId
      );
      return currAset;
    },
    items: function () {
      if (this.utang.log) {
        this.utang.log.reverse();
        return this.utang.log.map(
          ({ id, nama, tanggal, jumlah, debit, kredit, total, keterangan }) => {
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
      showModal: false,
      utangId: 0,
    };
  },
  methods: {},
};
</script>
