<template>
  <DefaultField
    :field="currentField"
    :errors="errors"
    :show-help-text="showHelpText"
    :full-width-content="fullWidthContent"
  >
    <template #field>
      <input
        :id="currentField.uniqueKey"
        type="text"
        class="w-full form-control form-input form-control-bordered"
        :class="errorClasses"
        :placeholder="currentField.placeholder"
        v-model="value"
        @input="format"
      />
    </template>
  </DefaultField>
</template>

<script>
import { DependentFormField, HandlesValidationErrors } from 'laravel-nova'
import {AsYouType, parsePhoneNumber} from "libphonenumber-js/max";

export default {
    mixins: [DependentFormField, HandlesValidationErrors],

  props: ['resourceName', 'resourceId', 'field'],

  methods: {
    /*
     * Set the initial, internal value for the field.
     */
    setInitialValue() {
      this.value = this.currentField.value || ''
    },

    /**
     * Fill the given FormData object with the field's internal value.
     */
    fill(formData) {
      formData.append(this.fieldAttribute, this.value || '')
    },

    format(e) {
        const phone = new AsYouType(this.currentField.country);
        this.value = phone.input(e.target.value);

        if (phone.isValid()) {
            const phoneParse = parsePhoneNumber(this.value, this.currentField.country)

            this.value = this.currentField.international ? phoneParse.formatInternational() : phoneParse.formatNational();
        }
    }
  },
}
</script>
