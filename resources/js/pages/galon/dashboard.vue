<template>
  <div class="row mb-5">
    <div class="col transaksi">
      <div class="judul"><h4>Transaksi</h4></div>

      <div class="d-flex flex-row-reverse">
        <a class="btn btn-primary btn-sm">Pembayar</a>
      </div>
      <div class="d-flex pt-1">
        <button class="btn btn-primary btn-sm me-auto">Add Item</button>
        <button class="btn btn-primary btn-sm">Jumlah Utang/Piutang</button>
      </div>
    </div>
    <div class="col-12">
      <div class="card">
        <div class="card-body p-0">
          <div class="item border border-primary p-2">
            <div class="d-flex sepertiga">
              <div>Air Galon</div>
              <div class="text-center">33x</div>
            </div>
            <div class="d-flex">
              <div class="input-group input-in-out input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm"
                  >Masuk</span
                >
                <input
                  type="number"
                  class="form-control"
                  aria-label="Sizing example input"
                  aria-describedby="inputGroup-sizing-sm"
                />
              </div>
              <div class="input-group input-in-out input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm"
                  >Keluar</span
                >
                <input
                  type="number"
                  class="form-control"
                  aria-label="Sizing example input"
                  aria-describedby="inputGroup-sizing-sm"
                />
              </div>
            </div>
            <div class="d-flex sepertiga">
              <div class="input-group input-in-out input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm"
                  >jumlah</span
                >
                <input
                  type="number"
                  class="form-control"
                  aria-label="Sizing example input"
                  aria-describedby="inputGroup-sizing-sm"
                />
              </div>
              <div class="text-center">  x Rp 10 000</div>
              <div class="text-end">Rp 20 000</div>
            </div>
          </div>
          <div class="item border border-primary p-2">
            <div class="d-flex sepertiga">
              <div>Galon</div>
              <div class="text-center">50x</div>
            </div>
            <div class="d-flex sepertiga">
              <div class="input-group input-in-out input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm"
                  >jumlah</span
                >
                <input
                  type="number"
                  class="form-control"
                  aria-label="Sizing example input"
                  aria-describedby="inputGroup-sizing-sm"
                />
              </div>
              <div class="text-center">  x Rp 35 000</div>
              <div class="text-end">Rp 35 000</div>
            </div>
          </div>
          <div class="item border border-primary p-2">
            <div class="d-flex sepertiga">
              <div>Kardus</div>
              <div>20x</div>
            </div>
            <div class="d-flex sepertiga">
              <div class="input-group input-in-out input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm"
                  >jumlah</span
                >
                <input
                  type="number"
                  class="form-control"
                  aria-label="Sizing example input"
                  aria-describedby="inputGroup-sizing-sm"
                />
              </div>
              <div class="text-center">  x Rp 30 000</div>
              <div class="text-end">Rp 30 000</div>
            </div>
          </div>
          <div class="item border border-primary p-2">
            <div class="d-flex pt-1">
              <div class="me-auto">Jumlah</div>
              <div>Rp 85 000</div>
            </div>
            <div class="d-flex pt-1">
              <div class="me-auto">Total</div>
              <div>Rp 75 000</div>
            </div>
            <div class="d-flex pt-1">
              <div class="me-auto">Uang</div>
              <div>Rp 100 000</div>
            </div>
            <div class="d-flex pt-1">
              <div class="me-auto">Kembali</div>
              <div>Rp 25 000</div>
            </div>
          </div>
            <button class="btn btn-primary btn-sm me-auto">Submit</button>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.transaksi {
  margin-top: 0.3em;
}
.judul {
  margin-top: 0.5em;
  text-align: center;
}

.sepertiga > div {
  width: 33.33333333%;
}

h4 {
  font-weight: bold;
}

.item {
  margin-top: 0.4em;
}

.input-in-out {
  height: 20px;
}
</style>

<script>
// import axios from 'axios'
// {
//     "payer_type": "Distributor",
//     "payer_id": "1",
//     "transaksis": [
//         {
//             "jumlah": 12,
//             "keterangan": "test",
//             "tipe": "Aset",
//             "id": 2,
//             "kode": "debit"
//         },
//         {
//             "aset_id":2,
//             "jumlah": 12,
//             "kode": "kredit",
//             "keterangan": "test",
//             "tipe": "Utang"
//         }
//     ]
// }
import * as vuex from "vuex";
export default {
  middleware: "auth",
  computed: vuex.mapGetters({
    user: "auth/user",
  }),
  components: {},
  computed: {
    ...vuex.mapGetters({
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
  methods: {
    addProduk($id) {
      console.log($id);
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
