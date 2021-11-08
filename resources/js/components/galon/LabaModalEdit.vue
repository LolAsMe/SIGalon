<template>
  <basic-modal v-if="showModal" @close="showModal = false">
    <h5 slot="header">Edit Laba</h5>
    <div slot="body">
      <form
        id="editForm"
        @submit.prevent="editLaba"
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
        form="editForm"
        value="Edit"
      /> </template
  ></basic-modal>
</template>

<script>
import BasicModal from "~/components/galon/BasicModal";
import Form from "vform";

export default {
  name: "LabaModalEdit",
  components: {
    BasicModal,
  },
  props: {},
  data() {
    return {
      form: new Form({
        id: "",
        nama: "",
        total:''
      }),
      showModal: false,
    };
  },
  methods: {
    async editLaba() {
      const { data } = await this.form.patch("api/saldo/" + this.form.id);
      this.$store.commit("saldo/editLaba", data);
      this.form.reset();
      this.showModal=false;
    },
    setLaba(saldo) {
      this.form.id = saldo.id;
      this.form.nama = saldo.nama;
      this.form.total = saldo.total;
    },
  },
};
</script>
