<template>
  <div v-if="showModal" @close="showModal = false">
    <h5 slot="header">Log Piutang</h5>
    <div slot="body">
      <v-table :items="items" :itemsTitle="itemsTitle"> </v-table>
    </div>
  </div>
</template>

<script>

import VTable from "~/components/VTable";
export default {
  name: "PiutangModalShow",
  props: {
    // item: { type: Object, default: null },
  },
  components: {
    VTable
  },
  computed: {
    piutang: function () {
      let currAset = this.$store.getters["piutang/piutangs"].find(
        (piutang) => piutang.id === this.piutangId
      );
      return currAset;
    },
    items: function () {
      if (this.piutang.log) {
        this.piutang.log.reverse();
        return this.piutang.log.map(
          ({ id, nama, tanggal, jumlah, debit, kredit, total, keterangan }) => {
            debit = this.toCurrency(debit)
            kredit = this.toCurrency(kredit)
            total = this.toCurrency(total)
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
      piutangId: 0,
    };
  },
  methods: {},
};
</script>
