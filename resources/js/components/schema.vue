<!--
  - /**
  -  *  * Copyright (C) optimoapps.com - All Rights Reserved
  -  *  * Unauthorized copying of this file, via any medium is strictly prohibited
  -  *  * Proprietary and confidential
  -  *  * Written by Sathish Kumar(satz) <sathish.thi@gmail.com>, ManiKandan<smanikandanit@gmail.com >
  -  *
  -  */
  -->

<template>
  <div class="publish-fields">
    <publish-field
        v-for="field in fields"
        :key="field.handle"
        :config="field"
        :value="value[field.handle]"
        :meta="meta.meta[field.handle]"
        class="form-group"
        @focus="$emit('focus')"
        @blur="$emit('blur')"
        @input="updateKey(field.handle, $event)"
    />
  </div>
</template>
<script>
export default {

  mixins: [Fieldtype],
  computed: {
    fields() {
      return _.chain(this.meta.fields)
          .map(field => {
            return {
              handle: field.handle,
              ...field.field
            };
          })
          .values()
          .value();
    }
  },
  mounted() {

  },
  methods: {
    updateKey(handle, value) {
      let richSnippet = this.value;
      Vue.set(richSnippet, handle, value);
      this.update(richSnippet);
    }
  },
}
</script>