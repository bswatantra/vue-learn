<template>
  <form action="" @submit="createPost(post)">
    <div class="mt-28 mx-20">
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
          Title
        </label>
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
        <label class="block text-gray-700 text-sm font-bold mb-2" for="content">
          Content
        </label>
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
          v-if="isValid"
          @click.prevent="createPost(post)"
        >
          Save
        </button>
        <!-- error message -->
        <div class="mt-4 max-w-screen-sm" v-if="errors.length">
          <div
            class="
              flex
              items-center
              bg-red-400
              text-white text-sm
              font-bold
              rounded-lg
              px-4
              py-3
            "
            role="alert"
          >
            <svg
              class="fill-current w-4 h-4 mr-2"
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 20 20"
            >
              <path
                d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"
              />
            </svg>
            <div>
              <p v-for="error in errors" :key="error">
                {{ error }}
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</template>

  <script>
import { mapGetters } from "vuex";

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
    ...mapGetters(["errors"]),
    isValid() {
      return this.post.title !== "" && this.post.content !== "";
    },
  },
};
</script>