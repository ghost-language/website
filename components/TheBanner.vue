<template>
    <div class="bg-gray-800">
          <div class="w-full py-2 flex items-center justify-center">
              <p class="font-medium text-white text-sm">
                  Ghost is under heavy active development.
              </p>
          </div>
      </div>
</template>

<script>
    export default {
        data() {
            return {
                latestVersion: this.$config.latestVersion,
            }
        },
    }
</script>