<template>
  <div class="w-full px-4 md:px-12 text-xl text-gray-800 leading-normal">
    <CreatePost />

    <p class="text-center text-semibold text-2xl text-green-400" v-if="loading">
      Loading...
    </p>
    <div v-else>
      <div v-if="posts.length">
        <div
          class="container w-full mx-16 md:max-w-4xl lg:max-w-7xl md:mx-16 pt-8"
          v-for="post in posts"
          :key="post.id"
        >
          <div class="font-sans">
            <h1
              class="
                font-bold font-sans
                break-normal
                text-gray-900
                pt-6
                pb-2
                text-3xl
                md:text-4xl
              "
            >
              {{ post.title }}
            </h1>
            <p class="text-sm md:text-base font-normal text-gray-600">
              Published at {{ post.created_at }}
            </p>
          </div>
          <p class="py-6">
            {{ post.content }}
          </p>

          <button
            class="
              text-red-600
              bg-transparent
              border border-solid border-red-500
              hover:bg-red-500
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
            @click="deletePost(post)"
          >
            Delete
          </button>
          <button
            class="
              text-green-400
              bg-transparent
              border border-solid border-green-400
              hover:bg-green-400
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
          >
            Edit
          </button>
        </div>
      </div>
      <div class="text-semibold text-center text-green-400 mt-4" v-else>
        Data not found yet!
      </div>
    </div>

    <div class="mx-12">
      <div class="text-base md:text-sm text-gray-500 px-4 py-6">
        Tags:
        <a
          href="#"
          class="
            text-base
            md:text-sm
            text-green-500
            no-underline
            hover:underline
          "
          >Link</a
        >
        .
        <a
          href="#"
          class="
            text-base
            md:text-sm
            text-green-500
            no-underline
            hover:underline
          "
          >Link</a
        >
      </div>

      <hr class="border-b-2 border-gray-400 mb-8 mx-4" />

      <div class="container px-4">
        <div
          class="
            font-sans
            bg-gradient-to-b
            from-green-100
            to-gray-100
            rounded-lg
            shadow-xl
            p-4
            text-center
          "
        >
          <h2 class="font-bold break-normal text-xl md:text-3xl">
            Subscribe to my Newsletter
          </h2>
          <h3 class="font-bold break-normal text-gray-600 text-sm md:text-base">
            Get the latest posts delivered right to your inbox
          </h3>
          <div class="w-full text-center pt-4">
            <form action="#">
              <div
                class="max-w-xl mx-auto p-1 pr-0 flex flex-wrap items-center"
              >
                <input
                  type="email"
                  placeholder="youremail@example.com"
                  class="
                    flex-1
                    mt-4
                    appearance-none
                    border border-gray-400
                    rounded
                    shadow-md
                    p-3
                    text-gray-600
                    mr-2
                    focus:outline-none
                  "
                />
                <button
                  type="submit"
                  class="
                    flex-1
                    mt-4
                    block
                    md:inline-block
                    appearance-none
                    bg-green-500
                    text-white text-base
                    font-semibold
                    tracking-wider
                    uppercase
                    py-4
                    rounded
                    shadow
                    hover:bg-green-400
                  "
                >
                  Subscribe
                </button>
              </div>
            </form>
          </div>
        </div>
        <hr class="border-b-2 border-gray-400 mb-8 mx-4" />

        <div class="font-sans flex justify-between content-center px-4 pb-12">
          <div class="text-left">
            <span class="text-xs md:text-sm font-normal text-gray-600"
              >&lt; Previous Post</span
            ><br />
            <p>
              <a
                href="#"
                class="
                  break-normal
                  text-base
                  md:text-sm
                  text-green-500
                  font-bold
                  no-underline
                  hover:underline
                "
                >Blog title</a
              >
            </p>
          </div>
          <div class="text-right">
            <span class="text-xs md:text-sm font-normal text-gray-600"
              >Next Post &gt;</span
            ><br />
            <p>
              <a
                href="#"
                class="
                  break-normal
                  text-base
                  md:text-sm
                  text-green-500
                  font-bold
                  no-underline
                  hover:underline
                "
                >Blog title</a
              >
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";

import CreatePost from "./CreatePost.vue";

export default {
  name: "Posts",
  components: {
    CreatePost,
  },
  mounted() {
    this.$store.dispatch("fetchPosts");
  },
  methods: {
    deletePost(post) {
      this.$store.dispatch("deletePost", post);
    },
  },
  computed: {
    ...mapGetters(["posts"]),
    ...mapGetters(["loading"]),
  },
};
</script>