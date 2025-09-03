<script setup >
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import {store} from "@/actions/App/Http/Controllers/FeatureController.js"
import { defineProps } from 'vue';

const props = defineProps({
    features:Object
})
const test = [...props.features.data]

console.log(test)
const priorities = ref([
    { label: 'Не выбран', value: null },
    { label: 'Высокий', value: 'высокий' },
    { label: 'Средний', value: 'средний' },
    { label: 'Низкий', value: 'низкий' }
]);


const form = useForm({
    title: '',
    card_number: '',
    link_task: '',
    description: '',
    steps: '',
    expected_results: '',
    notes: '',
    questions: '',
    priority: null,
    features: []
});

const submit = () => {
    form.post(store);
};
</script>

<template>
        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <Card class="p-4">
                    <template #title>
                        <h1 class="text-2xl font-bold mb-4">Создать тест-кейс</h1>
                    </template>

                    <template #content>
                        <form @submit.prevent="submit" class="p-fluid">
                            <div class="field mb-4">
                                <label for="title" class="font-semibold">Название:</label>
                                <InputText
                                    id="title"
                                    v-model="form.title"
                                    class="w-full"
                                    placeholder="Введите название карточки (обязательно)"
                                    :class="{ 'p-invalid': form.errors.title }"
                                    required
                                />
                                <small class="p-error" v-if="form.errors.title">{{ form.errors.title }}</small>
                            </div>

                            <div class="field mb-4">
                                <label for="card_number" class="font-semibold">Номер карточки и имя:</label>
                                <InputText
                                    id="card_number"
                                    v-model="form.card_number"
                                    class="w-full"
                                    placeholder="Введите номер и имя тестируемой карточки (обязательно)"
                                    :class="{ 'p-invalid': form.errors.card_number }"
                                    required
                                />
                                <small class="p-error" v-if="form.errors.card_number">{{ form.errors.card_number }}</small>
                            </div>

                            <div class="field mb-4">
                                <label for="link_task" class="font-semibold">Ссылка на карточку в трекере:</label>
                                <InputText
                                    id="link_task"
                                    v-model="form.link_task"
                                    class="w-full"
                                    placeholder="Введите ссылку тестируемой карточки (обязательно)"
                                    :class="{ 'p-invalid': form.errors.link_task }"
                                    required
                                />
                                <small class="p-error" v-if="form.errors.link_task">{{ form.errors.link_task }}</small>
                            </div>

                            <div class="field mb-4">
                                <label for="description" class="font-semibold">Описание:</label>
                                <Textarea
                                    id="description"
                                    v-model="form.description"
                                    rows="5"
                                    class="w-full"
                                    :class="{ 'p-invalid': form.errors.description }"
                                />
                                <small class="p-error" v-if="form.errors.description">{{ form.errors.description }}</small>
                            </div>

                            <div class="field mb-4">
                                <label for="steps" class="font-semibold">Шаги:</label>
                                <Textarea
                                    id="steps"
                                    v-model="form.steps"
                                    rows="5"
                                    class="w-full"
                                    :class="{ 'p-invalid': form.errors.steps }"
                                />
                                <small class="p-error" v-if="form.errors.steps">{{ form.errors.steps }}</small>
                            </div>

                            <div class="field mb-4">
                                <label for="expected_results" class="font-semibold">Ожидаемый результат:</label>
                                <Textarea
                                    id="expected_results"
                                    v-model="form.expected_results"
                                    rows="5"
                                    class="w-full"
                                    :class="{ 'p-invalid': form.errors.expected_results }"
                                />
                                <small class="p-error" v-if="form.errors.expected_results">{{ form.errors.expected_results }}</small>
                            </div>

                            <div class="field mb-4">
                                <label for="notes" class="font-semibold">Заметки:</label>
                                <Textarea
                                    id="notes"
                                    v-model="form.notes"
                                    rows="5"
                                    class="w-full"
                                    :class="{ 'p-invalid': form.errors.notes }"
                                />
                                <small class="p-error" v-if="form.errors.notes">{{ form.errors.notes }}</small>
                            </div>

                            <div class="field mb-4">
                                <label for="questions" class="font-semibold">Вопросы:</label>
                                <Textarea
                                    id="questions"
                                    v-model="form.questions"
                                    rows="5"
                                    class="w-full"
                                    :class="{ 'p-invalid': form.errors.questions }"
                                />
                                <small class="p-error" v-if="form.errors.questions">{{ form.errors.questions }}</small>
                            </div>

                            <div class="field mb-4">
                                <label for="priority" class="font-semibold">Приоритет:</label>
                                <Dropdown
                                    id="priority"
                                    v-model="form.priority"
                                    :options="priorities"
                                    optionLabel="label"
                                    optionValue="value"
                                    placeholder="Выберите приоритет"
                                    class="w-full"
                                    :class="{ 'p-invalid': form.errors.priority }"
                                />
                                <small class="p-error" v-if="form.errors.priority">{{ form.errors.priority }}</small>
                            </div>

                            <div class="field mb-4">
                                <label for="features" class="font-semibold">Функционал:</label>
                                <MultiSelect
                                    id="features"
                                    v-model="form.features"
                                    :options="props.features.data"
                                    filter
                                    optionLabel="name"
                                    optionValue="id"
                                    placeholder="Выберите функционал"
                                    class="w-full"
                                    :class="{ 'p-invalid': form.errors.features }"
                                />
                                <small class="p-error" v-if="form.errors.features">{{ form.errors.features }}</small>
                            </div>

                            <div class="flex justify-end mt-6">
                                <Button
                                    type="submit"
                                    label="Создать"
                                    icon="pi pi-check"
                                    :loading="form.processing"
                                    class="p-button-success"
                                />
                            </div>
                        </form>
                    </template>
                </Card>
            </div>
        </div>
</template>

