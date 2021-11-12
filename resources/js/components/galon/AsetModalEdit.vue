<template>
  <basic-modal v-if="showModal" @close="showModal = false">
    <h5 slot="header">Edit Aset</h5>
    <div slot="body">
      <form
        id="editForm"
        @submit.prevent="editAset"
        @keydown="form.onKeydown($event)"
      >
        <div class="form-floating mb-3">
          <input
            v-model="form.nama"
            type="text"
            class="form-control"
            placeholder="nama"
          />
          <label for="floatingInput">Nama</label>
        </div>
        <div class="form-floating mb-3">
          <input
            v-model="form.harga_jual"
            type="text"
            class="form-control"
            placeholder="harga_jual"
          />
          <label for="floatingInput">Harga Jual</label>
        </div>
        <div class="form-floating mb-3">
          <input
            v-model="form.harga_beli"
            type="text"
            class="form-control"
            placeholder="harga_beli"
          />
          <label for="floatingInput">Harga Beli</label>
        </div>
        <div class="form-floating mb-3">
          <input
            v-model="form.jumlah"
            type="text"
            class="form-control"
            placeholder="jumlah"
          />
          <label for="floatingInput">Jumlah</label>
        </div>
        <div class="form-floating mb-3">
          <input
            v-model="form.status"
            type="text"
            class="form-control"
            placeholder="status"
          />
          <label for="floatingInput">Status</label>
        </div>
      </form>
    </div>
    <template v-slot:footer>
      <button @click="showModal = false" class="btn btn-secondary btn-sm">
        Close
      </button>
      <input
        type="submit"
        class="btn btn-primary btn-sm"
        form="editForm"
        value="Edit"
      /> </template
  ></basic-modal>
</template>

<script>
import BasicModal from "~/components/galon/BasicModal";
import Form from "vform";

export default {
  name: "AsetModalEdit",
  components: {
    BasicModal,
  },
  props: {},
  data() {
    return {
      form: new Form({
        id: "",
        nama: "",
        harga_jual: "",
        harga_beli: "",
        jumlah: "",
        status: "",
      }),
      showModal: false,
    };
  },
  methods: {
    async editAset() {
      const { data } = await this.form.put("api/aset/" + this.form.id);
      // console.log(data)
      // this.$store.commit("aset/editAset", data);
      this.$store.dispatch("aset/fetchAsets");
      this.form.reset();
      this.showModal=false;
    },
    setAset(aset) {
      this.form.id = aset.id;
      this.form.nama = aset.nama;
      this.form.harga_jual = aset.harga_jual;
      this.form.harga_beli = aset.harga_beli;
      this.form.jumlah = aset.jumlah;
      this.form.status = aset.status;
    },
  },
};
</script>
