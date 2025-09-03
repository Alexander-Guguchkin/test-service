<template>
  <Head title="Добавить функционал" />

  <div class="container mx-auto p-4">
    <Card class="p-4">
      <template #title>
        <div class="text-2xl font-bold mb-4">Добавить функционал</div>
      </template>
      <template #content>
        <Form @submit="submit">
          <div class="field mb-4">
            <label for="name" class="block text-sm font-medium mb-2">Название:</label>
            <InputText
              id="name"
              v-model="form.name"
              class="w-full"
              :class="{ 'p-invalid': form.errors.name }"
              required
            />
            <small class="p-error" v-if="form.errors.name">{{ form.errors.name }}</small>
          </div>

          <div class="field mb-4">
            <label for="description" class="block text-sm font-medium mb-2">Описание:</label>
            <Textarea
              v-model="form.description"
              editorStyle="height: 320px"
              :class="{ 'p-invalid': form.errors.description }"
            />
            <small class="p-error" v-if="form.errors.description">{{ form.errors.description }}</small>
          </div>

          <div class="flex justify-end">
            <Button
              type="submit"
              label="Сохранить"
              icon="pi pi-check"
              :loading="form.processing"
              class="p-button-success"
            />
          </div>
        </Form>
      </template>
    </Card>
  </div>
</template>

<script setup>
import features from '@/routes/features'
import { useForm, Head, Form } from '@inertiajs/vue3'
import Card from 'primevue/card'
import InputText from 'primevue/inputtext'
import Editor from 'primevue/editor'
import Button from 'primevue/button'
import { Textarea } from 'primevue'

const form = useForm({
  name: '',
  description: ''
})

const submit = () => {
  form.post(features.store())
}
</script>

<style scoped>
.container {
  max-width: 800px;
}
</style>
