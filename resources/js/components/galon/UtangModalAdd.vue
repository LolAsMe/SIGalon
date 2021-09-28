<template>
  <basic-modal v-if="showModal" @close="showModal = false">
    <h5 slot="header">Tambah Utang</h5>
    <div slot="body">
      <form
        id="addForm"
        @submit.prevent="addUtang"
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
        form="addForm"
        value="Tambah"
      />
    </template>
  </basic-modal>
</template>

<script>
import BasicModal from "~/components/galon/BasicModal";
import Form from "vform";

export default {
  name: "UtangModalAdd",
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
        status: '',
      }),
      showModal: false,
    };
  },
  methods: {
    async addUtang() {
      const { data } = await this.form.post("api/utang");
      this.$store.commit("utang/addUtang", data);
      this.form.reset();
      this.showModal=false;
    },
  },
};
</script>
