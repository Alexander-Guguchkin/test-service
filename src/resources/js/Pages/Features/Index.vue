<script setup lang="ts">
import { ref, computed } from 'vue'
import { router } from '@inertiajs/vue3'
import MenuVertical from '@/components/MenuVertical.vue'
import features from "@/routes/features/index"

// Define props
const props = defineProps({
  features: Object
})

const loading = ref(false)

// Вычисляемое свойство для безопасного доступа к данным
const featuresData = computed(() => props.features?.data || [])
const featuresPagination = computed(() => ({
  per_page: props.features?.per_page || 10,
  total: props.features?.total || 0,
  current_page: props.features?.current_page || 1
}))

// Handle page changes
const onPageChange = (event) => {
  loading.value = true
  const page = event.page + 1 // PrimeVue uses 0-based index, Laravel uses 1-based
  router.visit(features.index.url({ page }))
}

// Navigation helper
const navigateTo = (url) => {
  router.visit(url)
}
</script>

<template>
  <div class="flex min-h-screen">
    <!-- Меню слева - фиксированное и во всю высоту -->
    <div class="fixed top-0 left-0 z-10 w-64 h-screen">
      <MenuVertical class="w-full h-full p-2 "/>
    </div>

    <!-- Основной контент с отступом под меню -->
    <div class="flex-1 ml-64">
      <div class="container px-4 py-6 mx-auto">
        <div class="flex items-center justify-between mb-6">
          <h1 class="text-3xl font-bold ">Список фич</h1>
          <Button
            icon="pi pi-plus"
            label="Создать новую фичу"
            class="p-button-success"
            @click="router.visit(features.create.url())"
          />
        </div>

        <Card>
          <template #content>
            <DataTable
              :value="featuresData"
              :paginator="true"
              :rows="featuresPagination.per_page"
              :totalRecords="featuresPagination.total"
              :first="(featuresPagination.current_page - 1) * featuresPagination.per_page"
              @page="onPageChange($event)"
              class="p-datatable-sm"
              :loading="loading"
              responsiveLayout="scroll"
            >
              <Column field="name" header="Название">
                <template #body="{data}">
                  {{ data.name }}
                </template>
              </Column>

              <Column field="description" header="Описание">
                <template #body="{data}">
                  <div class="max-w-md truncate">
                    {{ data.description }}
                  </div>
                </template>
              </Column>

              <Column header="Действия" style="width: 120px">
                <template #body="{data}">
                  <div class="flex space-x-2">
                    <Button
                      icon="pi pi-eye"
                      class="p-button-text p-button-info"
                      @click="navigateTo(route('features.show', data.id))"
                    />
                    <Button
                      icon="pi pi-pencil"
                      class="p-button-text p-button-warning"
                      @click="navigateTo(route('features.edit', data.id))"
                    />
                  </div>
                </template>
              </Column>

              <template #empty>
                <div class="p-4 text-center text-gray-500">
                  Нет фич
                </div>
              </template>
            </DataTable>
          </template>
        </Card>
      </div>
    </div>
  </div>
</template>
