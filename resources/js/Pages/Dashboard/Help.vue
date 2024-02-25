<script setup>
import Item            from '@/Components/Dashboard/Help/Item.vue';
import PageHeader      from '@/Components/Dashboard/PageHeader.vue';
import Table           from '@/Components/Dashboard/Table.vue';
import DashboardLayout from '@/Layouts/DashboardLayout.vue';

defineProps({
    users: String
});
</script>

<template>
  <DashboardLayout :title="$t('help.title')">
    <PageHeader />
    <div class="w-full">
      <div class="mt-4">
        <p v-text="$t('help.description')"></p>
      </div>
    </div>
    <div class="w-full">
      <Table :items="{total:1}">
        <template #head>
            <th
              class="table-item"
              v-text="$t('icon')"
            />
            <th
              class="table-item"
              v-text="$t('description')"
            />
        </template>
        <template #body>
          <Item icon="home">
            <p class="font-semibold" v-text="$t('help.home')"/>
          </Item>
        </template>
      </Table>
    </div>
  </DashboardLayout>
</template>
  