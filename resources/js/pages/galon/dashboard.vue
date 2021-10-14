<template>
  <div class="row mb-5 mx-md-4">
    <div class="col transaksi">
      <div class="judul">
        <h4>Transaksi <span class="text-primary">Penjualan</span></h4>
      </div>
      <div class="d-flex flex-row-reverse">
        <a class="btn btn-primary btn-sm" @click="showPayer = !showPayer">{{
          payer.nama
        }}</a>
      </div>
      <div v-show="showPayer" class="mt-1">
        <ul
          class="list-group"
          v-for="distributor in distributors"
          :key="distributor.id"
        >
          <li
            class="list-group-item mt-1"
            @click="(payer_id = distributor.id), (showPayer = !showPayer)"
          >
            {{ distributor.nama }}
          </li>
        </ul>
      </div>
      <div class="d-flex pt-1">
        <button
          type="button"
          class="btn btn-primary btn-sm me-auto"
          @click="showItemList = !showItemList"
        >
          Add Item
        </button>
        <button v-show="utang" class="btn btn-secondary btn-sm">
          {{ utang }}
        </button>
      </div>
    </div>
    <div v-show="showItemList" class="mt-1" id="addItem">
      <ul class="list-group" v-for="(aset, index) in asets" :key="aset.id">
        <li
          class="list-group-item mt-1 border"
          :class="{ 'border-success': showItem[index] }"
          @click="showItemData(index)"
        >
          {{ aset.nama }}
        </li>
      </ul>
      <button class="mt-1" @click="showItemList = !showItemList">Close</button>
    </div>
    <div v-if="!loading" class="col-12">
      <div class="card">
        <div class="card-body p-0">
          <div v-if="showItem[0]" class="item border border-primary p-2">
            <div class="d-flex sepertiga">
              <div>Air Galon</div>
              <div class="text-center">{{ asets[0].jumlah }}</div>
            </div>
            <div class="d-flex mt-2">
              <div class="input-group input-in-out input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm"
                  >Masuk</span
                >
                <input
                  v-model="jumlahMasuk"
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
                  v-model="jumlahKeluar"
                  type="number"
                  class="form-control"
                  aria-label="Sizing example input"
                  aria-describedby="inputGroup-sizing-sm"
                />
              </div>
            </div>
            <div
              class="d-inline-flex justify-content-evenly"
              style="width: 49.2%"
            >
              <button
                @click="jumlahMasuk += 5"
                class="btn btn-exsm btn-secondary"
              >
                +5
              </button>
              <button
                @click="jumlahMasuk += 1"
                class="btn btn-exsm btn-secondary"
              >
                +1
              </button>
              <button
                @click="jumlahMasuk -= 1"
                class="btn btn-exsm btn-secondary"
              >
                -1
              </button>
              <button
                @click="jumlahMasuk -= 5"
                class="btn btn-exsm btn-secondary"
              >
                -5
              </button>
            </div>
            <div
              class="d-inline-flex justify-content-evenly"
              style="width: 49.2%"
            >
              <button
                @click="jumlahKeluar += 5"
                class="btn btn-exsm btn-secondary"
              >
                +5
              </button>
              <button
                @click="jumlahKeluar += 1"
                class="btn btn-exsm btn-secondary"
              >
                +1
              </button>
              <button
                @click="jumlahKeluar -= 1"
                class="btn btn-exsm btn-secondary"
              >
                -1
              </button>
              <button
                @click="jumlahKeluar -= 5"
                class="btn btn-exsm btn-secondary"
              >
                -5
              </button>
            </div>
            <div class="d-flex sepertiga mt-3">
              <div class="input-group input-in-out input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm"
                  >jumlah</span
                >
                <input
                  v-model="jumlahAir"
                  type="number"
                  class="form-control"
                  aria-label="Sizing example input"
                  aria-describedby="inputGroup-sizing-sm"
                />
              </div>
              <div class="text-center">x Rp {{ asets[0].harga_jual }}</div>
              <div class="text-end">Rp {{ totalAir }}</div>
            </div>
            <div
              class="d-inline-flex justify-content-evenly"
              style="width: 100%"
            >
              <button
                @click="jumlahAir += 10"
                class="btn btn-exsm btn-secondary"
              >
                +10
              </button>
              <button
                @click="jumlahAir += 5"
                class="btn btn-exsm btn-secondary"
              >
                +5
              </button>
              <button
                @click="jumlahAir += 1"
                class="btn btn-exsm btn-secondary"
              >
                +1
              </button>
              <button
                @click="jumlahAir -= 1"
                class="btn btn-exsm btn-secondary"
              >
                -1
              </button>
              <button
                @click="jumlahAir -= 5"
                class="btn btn-exsm btn-secondary"
              >
                -5
              </button>
              <button
                @click="jumlahAir -= 10"
                class="btn btn-exsm btn-secondary"
              >
                -10
              </button>
            </div>
          </div>
          <div v-if="showItem[1]" class="item border border-primary p-2">
            <div class="d-flex sepertiga">
              <div>Galon</div>
              <div class="text-center">{{ asets[1].jumlah }}</div>
            </div>
            <div class="d-flex sepertiga">
              <div class="input-group input-in-out input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm"
                  >jumlah</span
                >
                <input
                  v-model="jumlahGalon"
                  type="number"
                  class="form-control"
                  aria-label="Sizing example input"
                  aria-describedby="inputGroup-sizing-sm"
                />
              </div>
              <div class="text-center">x Rp {{ asets[1].harga_jual }}</div>
              <div class="text-end">Rp {{ totalGalon }}</div>
            </div>
            <div
              class="d-inline-flex justify-content-evenly"
              style="width: 100%"
            >
              <button
                @click="jumlahGalon += 10"
                class="btn btn-exsm btn-secondary"
              >
                +10
              </button>
              <button
                @click="jumlahGalon += 5"
                class="btn btn-exsm btn-secondary"
              >
                +5
              </button>
              <button
                @click="jumlahGalon += 1"
                class="btn btn-exsm btn-secondary"
              >
                +1
              </button>
              <button
                @click="jumlahGalon -= 1"
                class="btn btn-exsm btn-secondary"
              >
                -1
              </button>
              <button
                @click="jumlahGalon -= 5"
                class="btn btn-exsm btn-secondary"
              >
                -5
              </button>
              <button
                @click="jumlahGalon -= 10"
                class="btn btn-exsm btn-secondary"
              >
                -10
              </button>
            </div>
          </div>
          <div v-if="showItem[2]" class="item border border-primary p-2">
            <div class="d-flex sepertiga">
              <div>Kardus</div>
              <div class="text-center">{{ asets[2].jumlah }}</div>
            </div>
            <div class="d-flex sepertiga">
              <div class="input-group input-in-out input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm"
                  >jumlah</span
                >
                <input
                  v-model="jumlahKardus"
                  type="number"
                  class="form-control"
                  aria-label="Sizing example input"
                  aria-describedby="inputGroup-sizing-sm"
                />
              </div>
              <div class="text-center">x Rp {{ asets[2].harga_jual }}</div>
              <div class="text-end">Rp {{ totalKardus }}</div>
            </div>
            <div
              class="d-inline-flex justify-content-evenly"
              style="width: 100%"
            >
              <button
                @click="jumlahKardus += 10"
                class="btn btn-exsm btn-secondary"
              >
                +10
              </button>
              <button
                @click="jumlahKardus += 5"
                class="btn btn-exsm btn-secondary"
              >
                +5
              </button>
              <button
                @click="jumlahKardus += 1"
                class="btn btn-exsm btn-secondary"
              >
                +1
              </button>
              <button
                @click="jumlahKardus -= 1"
                class="btn btn-exsm btn-secondary"
              >
                -1
              </button>
              <button
                @click="jumlahKardus -= 5"
                class="btn btn-exsm btn-secondary"
              >
                -5
              </button>
              <button
                @click="jumlahKardus -= 10"
                class="btn btn-exsm btn-secondary"
              >
                -10
              </button>
            </div>
          </div>
          <div class="item border border-primary p-2">
            <div class="d-flex pt-1">
              <div class="me-auto">Jumlah</div>
              <div>Rp {{ jumlah }}</div>
            </div>
            <div class="d-flex pt-1">
              <div class="me-auto">Bayar</div>
              <div>Rp {{ bayar }}</div>
            </div>
            <div
              class="d-inline-flex justify-content-evenly"
              style="width: 100%"
            >
              <button
                @click="bayar += 50000"
                class="btn btn-exsm btn-secondary"
              >
                +50
              </button>
              <button @click="bayar += 5000" class="btn btn-exsm btn-secondary">
                +5
              </button>
              <button @click="bayar += 1000" class="btn btn-exsm btn-secondary">
                +1
              </button>
              <button @click="bayar -= 1000" class="btn btn-exsm btn-secondary">
                -1
              </button>
              <button @click="bayar -= 5000" class="btn btn-exsm btn-secondary">
                -5
              </button>
              <button
                @click="bayar -= 50000"
                class="btn btn-exsm btn-secondary"
              >
                -50
              </button>
            </div>
            <div class="d-flex pt-1">
              <div class="me-auto">Uang</div>
              <div>Rp {{ uang }}</div>
            </div>
            <div
              class="d-inline-flex justify-content-evenly"
              style="width: 100%"
            >
              <button @click="uang += 50000" class="btn btn-exsm btn-secondary">
                +50
              </button>
              <button @click="uang += 5000" class="btn btn-exsm btn-secondary">
                +5
              </button>
              <button @click="uang += 1000" class="btn btn-exsm btn-secondary">
                +1
              </button>
              <button @click="uang -= 1000" class="btn btn-exsm btn-secondary">
                -1
              </button>
              <button @click="uang -= 5000" class="btn btn-exsm btn-secondary">
                -5
              </button>
              <button @click="uang -= 50000" class="btn btn-exsm btn-secondary">
                -50
              </button>
            </div>
            <div class="d-flex pt-1">
              <div class="me-auto">Kembali</div>
              <div>Rp {{ kembali }}</div>
            </div>
            <div>Keterangan : {{ sisaGalon }} Galon</div>
          </div>
          <button class="btn btn-primary btn-sm mt-1" @click="submitTransaksi">
            Submit
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import * as vuex from "vuex";
export default {
  middleware: "auth",
  data() {
    return {
      showItemList: false,
      showPayer: false,
      showItem: [true, false, false],
      payer_id: 1,
      jumlahMasuk: 0,
      jumlahKeluar: 0,
      jumlahAir: 0,
      jumlahGalon: 0,
      jumlahKardus: 0,
      bayar: 0,
      uang: 0,
    };
  },
  computed: {
    ...vuex.mapGetters({
      user: "auth/user",
      distributors: "distributor/distributors",
      supliers: "suplier/supliers",
      asets: "aset/asets",
    }),
    payer() {
      return this.distributors.find(
        (distributor) => distributor.id == this.payer_id
      );
    },
    utang() {
      if (this.payer.utang && this.payer.utang.length != 0) {
        return "-" + this.payer.utang[0].jumlah + " Galon";
      }
      if (this.payer.piutang && this.payer.piutang.length != 0) {
        return "+" + this.payer.piutang[0].jumlah + " Galon";
      }
    },
    totalAir() {
      return this.jumlahAir * this.asets[0].harga_jual;
    },
    totalGalon() {
      return this.jumlahGalon * this.asets[1].harga_jual;
    },
    totalKardus() {
      return this.jumlahKardus * this.asets[2].harga_jual;
    },
    jumlah() {
      let total = this.totalAir + this.totalGalon + this.totalKardus;
      this.bayar = total;
      this.uang = total;
      return total;
    },
    kembali() {
      return this.uang - this.bayar;
    },
    sisaGalon() {
      if (this.payer.utang && this.payer.utang.length != 0) {
        return (
          +this.payer.utang[0].jumlah + this.jumlahMasuk - this.jumlahKeluar
        );
      }
      if (this.payer.piutang && this.payer.piutang.length != 0) {
        return (
          -this.payer.piutang[0].jumlah + this.jumlahMasuk - this.jumlahKeluar
        );
      }
    },
    laba() {
      let dataLaba = 0;
      let labaAir =
        (this.asets[0].harga_jual - this.asets[0].harga_beli) * this.jumlahAir;
      let labaGalon =
        (this.asets[1].harga_jual - this.asets[1].harga_beli) *
        this.jumlahGalon;
      let labaKardus =
        (this.asets[2].harga_jual - this.asets[2].harga_beli) *
        this.jumlahKardus;
      dataLaba += labaAir;
      dataLaba += labaGalon;
      dataLaba += labaKardus;
      return {
        kredit: dataLaba,
        keterangan: "test",
        tipe: "Laba",
      };
    },
    transaksiItem() {
      let dataTransaksi = [];
      if (this.jumlahAir > 0) {
        let data = [
          {
            debit: this.jumlahAir * this.asets[0].harga_jual,
            jumlah: this.jumlahAir,
            harga: this.asets[0].harga_jual,
            keterangan: "test",
            tipe: "Saldo",
          },
          {
            jumlah: this.jumlahAir,
            keterangan: "test",
            tipe: "Aset",
            id: this.asets[0].id,
            kode: "kredit",
          },
        ];
        dataTransaksi.push(...data);
      }
      if (this.jumlahGalon > 0) {
        let data = [
          {
            debit: this.jumlahGalon * this.asets[1].harga_jual,
            jumlah: this.jumlahGalon,
            harga: this.asets[1].harga_jual,
            keterangan: "test",
            tipe: "Saldo",
          },
          {
            jumlah: this.jumlahGalon,
            keterangan: "test",
            tipe: "Aset",
            id: this.asets[1].id,
            kode: "kredit",
          },
        ];
        dataTransaksi.push(...data);
      }
      if (this.jumlahKardus > 0) {
        let data = [
          {
            debit: this.jumlahKardus * this.asets[2].harga_jual,
            jumlah: this.jumlahKardus,
            harga: this.asets[2].harga_jual,
            keterangan: "test",
            tipe: "Saldo",
          },
          {
            jumlah: this.jumlahKardus,
            keterangan: "test",
            tipe: "Aset",
            id: this.asets[2].id,
            kode: "kredit",
          },
        ];
        dataTransaksi.push(...data);
      }
      return dataTransaksi;
    },
    transaksiUtang() {
      let dataUtang = [];
      let kodeUtang;
      let kodeAset;
      let jumlahUtang;
      if (this.jumlahMasuk != this.jumlahKeluar) {
        if (this.jumlahMasuk > this.jumlahKeluar) {
          kodeUtang = "kredit";
          kodeAset = "debit";
          jumlahUtang = this.jumlahMasuk - this.jumlahKeluar;
        }
        if (this.jumlahMasuk < this.jumlahKeluar) {
          kodeUtang = "debit";
          kodeAset = "kredit";
          jumlahUtang = this.jumlahKeluar - this.jumlahMasuk;
        }
        let data = [
          {
            jumlah: jumlahUtang,
            keterangan: "test",
            tipe: "Aset",
            id: 2,
            kode: kodeUtang,
            jenis: "utang",
          },
          {
            aset_id: 2,
            jumlah: jumlahUtang,
            kode: kodeAset,
            keterangan: "test",
            tipe: "Utang",
          },
        ];
        dataUtang.push(...data);
      }
      return dataUtang;
    },
  },
  components: {},
  methods: {
    showItemData(index) {
      this.$set(this.showItem, index, !this.showItem[index]);
      if (index == 0 && this.showItem[index] == false) {
        this.jumlahAir = 0;
      } else if (index == 1 && this.showItem[index] == false) {
        this.jumlahGalon = 0;
      } else if (index == 2 && this.showItem[index] == false) {
        this.jumlahKardus = 0;
      }
    },
    async submitTransaksi() {
      try {
        let data = [];
        data = {
          payer_type: "Distributor",
          payer_id: "1",
          transaksis: [
            this.laba,
            ...this.transaksiItem,
            ...this.transaksiUtang,
          ],
        };
        const responseAxios = await axios.post("/api/transaksi", data);

        this.jumlahMasuk = 0;
        this.jumlahKeluar = 0;
        this.jumlahAir = 0;
        this.jumlahGalon = 0;
        this.jumlahKardus = 0;
        this.bayar = 0;
        this.uang = 0;
        this.$store.dispatch("distributor/fetchDistributors");
        this.$store.dispatch("suplier/fetchSupliers");
        this.$store.dispatch("aset/fetchAsets");
      } catch (error) {
        console.log(error);
      }
    },
  },

  watch: {
    jumlahAir: function (newJumlah) {
      this.jumlahMasuk = newJumlah;
      this.jumlahKeluar = newJumlah;
    },
  },
  created() {
    this.$store.dispatch("distributor/fetchDistributors");
    this.$store.dispatch("aset/fetchAsets");
    this.loading = false;
  },

  metaInfo() {
    return { title: "Dashboard" };
  },
};
</script>

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

.btn-exsm {
  font-size: 0.7rem;
  padding: 0.25em 0.6em 0.25em 0.6em;
}
</style>
