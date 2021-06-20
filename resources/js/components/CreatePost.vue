<template>
  <form action="" @submit="createPost(post)">
    <div class="mt-28 mx-20">
      <div class="mb-4">
        <input
          class="
            shadow
            appearance-none
            border
            rounded
            w-full
            py-2
            px-3
            bg-gray-200
            text-gray-700
            leading-tight
            focus:outline-none
            focus:shadow-outline
          "
          placeholder="Title"
          v-model="post.title"
        />
      </div>
      <div class="mb-4">
        <textarea
          class="
            shadow
            appearance-none
            border
            rounded
            w-full
            py-2
            px-3
            bg-gray-200
            text-gray-700
            leading-tight
            focus:outline-none
            focus:shadow-outline
          "
          placeholder="Content"
          v-model="post.content"
        />
      </div>
      <div>
        <button
          class="
            text-green-600
            bg-transparent
            border border-solid border-green-500
            hover:bg-green-500
            hover:text-white
            font-bold
            uppercase
            text-sm
            px-6
            py-3
            rounded
            outline-none
            focus:outline-none
            mr-1
            mb-1
            ease-linear
            transition-all
            duration-150
          "
          type="button"
          :disabled="!isValid"
          @click.prevent="createPost(post)"
        >
          Save
        </button>
      </div>
    </div>
  </form>
</template>

  <script>
export default {
  name: "CreatePost",
  data() {
    return {
      post: {
        title: "",
        content: "",
      },
    };
  },
  methods: {
    createPost(post) {
      this.$store.dispatch("createPost", post);
    },
  },
  computed: {
    isValid() {
      return this.post.title !== "" && this.post.content !== "";
    },
  },
};
</script>