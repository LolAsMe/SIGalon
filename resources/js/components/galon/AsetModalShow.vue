<template>
  <basic-modal v-if="showModal" @close="showModal=false">
    <h5 slot="header">Aset</h5>
    <div slot="body">
      {{ item }}
    </div>
    <template v-slot:footer>
      <button @click="showModal=false" class="btn btn-secondary btn-sm">
        Close
      </button>
    </template>
  </basic-modal>
</template>

<script>
import Modal from "~/components/Modal";
import BasicModal from "~/components/galon/BasicModal";

export default {
  name: "AsetModalShow",
  props: {
    // item: { type: Object, default: null },
  },
  components: {
    Modal,
    BasicModal,
  },
  data() {
    return {
      showModal:false,
      item: []
    };
  },
  methods: {
  },
};
</script>
