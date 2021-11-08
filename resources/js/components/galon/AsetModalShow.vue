<template>
  <div v-if="showModal" @close="showModal = false">
    <h5 slot="header">Log Aset {{aset.nama}}</h5>
    <div slot="body">
      <v-table
          :items="items"
          :itemsTitle="itemsTitle"
        >
      </v-table>
    </div>
  </div>
</template>

<script>
import Modal from "~/components/Modal";
import BasicModal from "~/components/galon/BasicModal";
import VTable from "~/components/VTable";

export default {
  name: "AsetModalShow",
  props: {
    // item: { type: Object, default: null },
  },
  components: {
    Modal,
    BasicModal,
    VTable
  },
  computed: {
    aset: function () {
      let currAset = this.$store.getters["aset/asets"].find(
        (aset) => aset.id === this.asetId
      );
      return currAset;
    },
    items: function () {
      if (this.aset.log) {
        this.aset.log.reverse()
        return this.aset.log.map(
          ({ id, nama, tanggal, jumlah, debit, kredit, total,keterangan }) => {
            total = total/this.aset.harga_beli
            debit = this.toCurrency(debit)
            kredit = this.toCurrency(kredit)
            return { id, nama, tanggal, jumlah, debit, kredit, total,keterangan };
          }
        );
      }
    },
    itemsTitle: function () {
      return ["ID", "Nama", "Tanggal", "Jumlah", "Debit","Kredit","Total", "Keterangan"];
    },
  },
  data() {
    return {
      showModal: false,
      asetId: 1,
    };
  },
  props: {},
  methods: {},
};
</script>
