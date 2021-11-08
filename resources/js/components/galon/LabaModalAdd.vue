<template>
  <basic-modal v-if="showModal" @close="showModal = false">
    <h5 slot="header">Tambah Laba</h5>
    <div slot="body">
      <form
        id="addForm"
        @submit.prevent="addLaba"
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
            v-model="form.total"
            type="text"
            class="form-control"
            placeholder="harga_jual"
          />
          <label for="floatingInput">Total</label>
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
  name: "LabaModalAdd",
  components: {
    BasicModal,
  },
  props: {},
  data() {
    return {
      form: new Form({
        id: "",
        nama: "",
        total: ""
      }),
      showModal: false,
    };
  },
  methods: {
    async addLaba() {
      const { data } = await this.form.post("api/saldo");
      this.$store.commit("saldo/addLaba", data);
      this.form.reset();
      this.showModal = false;
    },
  },
};
</script>
