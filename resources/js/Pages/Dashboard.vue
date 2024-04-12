<script setup>
import { computed } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3'


const props = defineProps({
  users: Array
});


const verifiedUsersCount = computed(() => {
  return props.users.filter(user => user.email_verified_at !== null).length;
});

const unverifiedUsersCount = computed(() => {
  return props.users.filter(user => user.email_verified_at === null).length;
});
</script>

<template>
  <AuthenticatedLayout>
    <Head title="Welcome" />
    <div class="container mx-auto">
      <div class="w-full lg:w-3/4 mx-auto">
        <div class="bg-white shadow-md rounded my-6">
          <div class="overflow-y-auto max-h-120">
            <div class="flex justify-between px-4 py-2">
              <div class="grid gap-6 mb-2 md:grid-cols-2 xl:grid-cols-4">
                <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                  <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                      <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
                    </svg>
                  </div>
                  <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                      Verified Users
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                      {{ verifiedUsersCount }}
                    </p>
                  </div>
                </div>
                <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                  <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                      <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
                    </svg>
                  </div>
                  <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                      Unverified Users
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                     {{unverifiedUsersCount}}
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <table class="text-left w-full table-auto">
              <thead class="bg-black flex text-white w-full">
                <tr class="flex w-full mb-4">
                  <th class="p-4 w-1/4">Name</th>
                  <th class="p-4 w-1/4">Email</th>
                  <th class="p-4 w-1/4">Verified Date</th>
                  <th class="p-4 w-1/4">Created Date</th>
                </tr>
              </thead>
              <tbody class="bg-grey-light flex flex-col items-center justify-between overflow-y-scroll w-full" style="height: 80vh;">
                <tr v-for="(user, i) in users" :key="i" class="flex w-full mb-4">
                  <td class="px-4 py-2 w-1/4">{{ user.name }}</td>
                  <td class="px-4 py-2 w-1/4">{{ user.email }}</td>
                  <td class="px-4 py-2 w-1/4">{{ user.email_verified_at ? user.email_verified_at.slice(0, 10) : ''  }}</td>
                  <td class="px-4 py-2 w-1/4">{{ user.created_at ? user.created_at.slice(0, 10) : ''  }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
