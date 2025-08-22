<template>
  <div class="flex min-h-screen">
    <!-- Меню слева - фиксированное и во всю высоту -->
    <div class="fixed top-0 left-0 z-10 w-64 h-screen">
      <MenuVertical class="w-full h-full p-2 "/>
    </div>

    <!-- Основной контент с отступом под меню -->
    <div class="flex-1 ml-64"> <!-- ml-64 должен соответствовать ширине меню -->
      <div class="container px-4 py-6 mx-auto">
        <div class="flex items-center justify-between mb-6">
          <h1 class="text-3xl font-bold ">Список тест-кейсов</h1>
          <Button
            icon="pi pi-plus"
            label="Создать новый тест-кейс"
            class="p-button-success"
            @click="navigateTo(route('test-cases.create'))"
          />
        </div>

        <Card>
          <template #content>
            <DataTable
              :value="testCases.data"
              :paginator="true"
              :rows="testCases.per_page"
              :totalRecords="testCases.total"
              :first="(testCases.current_page - 1) * testCases.per_page"
              @page="onPageChange($event)"
              class="p-datatable-sm"
              :loading="loading"
              responsiveLayout="scroll"
            >
              <Column field="title" header="Название">
                <template #body="{data}">
                  <a :href="route('test-cases.show', data.id)" class="text-blue-600 hover:text-blue-800 hover:underline">
                    {{ data.title }}
                  </a>
                </template>
              </Column>
              <Column field="card_number" header="Номер карточки">
                <template #body="{data}">
                  <a :href="data.link_task" target="_blank" class="text-blue-600 hover:text-blue-800 hover:underline">
                    {{ data.card_number }}
                  </a>
                </template>
              </Column>
              <Column header="Действия" style="width: 120px">
                <template #body="{data}">
                  <div class="flex space-x-2">
                    <Button
                      icon="pi pi-eye"
                      class="p-button-text p-button-info"
                      @click="navigateTo(route('test-cases.show', data.id))"
                    />
                    <Button
                      icon="pi pi-pencil"
                      class="p-button-text p-button-warning"
                      @click="navigateTo(route('test-cases.edit', data.id))"
                    />
                  </div>
                </template>
              </Column>
              <template #empty>
                <div class="p-4 text-center text-gray-500">
                  Нет тест-кейсов
                </div>
              </template>
            </DataTable>
          </template>
        </Card>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { usePage, router } from '@inertiajs/vue3'
import Card from 'primevue/card'
import DataTable from 'primevue/datatable'
import Column from 'primevue/column'
import Button from 'primevue/button'
import MenuVertical from '../../components/Blocks/MenuVertical.vue'

// Define props
const props = defineProps({
  testCases: Object
})

const loading = ref(false)

// Handle page changes
const onPageChange = (event) => {
  loading.value = true
  const page = event.page + 1 // PrimeVue uses 0-based index, Laravel uses 1-based
  router.get(route('test-cases.index', { page }), {}, {
    preserveState: true,
    onFinish: () => {
      loading.value = false
    }
  })
}

// Navigation helper
const navigateTo = (url) => {
  router.visit(url)
}
</script>

<style scoped>
.container {
  max-width: 1200px;
}

:deep(.p-datatable .p-datatable-thead > tr > th) {
  font-weight: 600;
}

:deep(.p-paginator) {
  background: transparent;
  border: none;
  padding: 1rem 0;
}
</style>
