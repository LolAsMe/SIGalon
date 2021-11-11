<template>
  <div v-if="showModal" @close="showModal = false">
    <h5 slot="header">Log Transaksi</h5>
    <div slot="body">
      <v-table :items="items" :itemsTitle="itemsTitle"> </v-table>
    </div>
  </div>
</template>

<script>

import VTable from "~/components/VTable";
export default {
  name: "TransaksiModalShow",
  props: {
    // item: { type: Object, default: null },
  },
  components: {
    VTable
  },
  computed: {
    transaksi: function () {
      let currTransaksi = this.$store.getters["transaksi/transaksis"].find(
        (transaksi) => transaksi.id === this.transaksiId
      );
      return currTransaksi;
    },
    items: function () {
      if (this.transaksi.detail) {
        return this.transaksi.detail.map(
          ({ id, jumlah, debit, kredit, total, keterangan,log }) => {
            let tipe = log ? log.owner_type : "-"
            debit = this.toCurrency(debit)
            kredit = this.toCurrency(kredit)
            total = this.toCurrency(total)
            return {
              id,
              tipe,
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
        "Tipe",
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
      transaksiId: 0,
    };
  },
  methods: {},
};
</script>
