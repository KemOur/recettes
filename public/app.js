Vue.createApp({
  data() {
    return {
      recipes: [],
      recipe: {},
    };
  },
  methods: {
    deleteRecipe(id) {
      let recipes = this.recipes.filter((recipe) => {
        return recipe.id != id;
      });
      axios.delete("api", {
        data: { id: id },
      });
      this.recipes = recipes;
    },
    addRecipe() {
      if (
        !this.recipe.name ||
        !this.recipe.people ||
        !this.recipe.time ||
        !this.recipe.ingredients ||
        !this.recipe.preparation
      ) {
        return;
      }

      console.log(this.recipe);
      this.recipes.push(this.recipe);

      const formData = new FormData();
      formData.append("name", this.recipe.name);
      formData.append("people", this.recipe.people);
      formData.append("time", this.recipe.time);
      formData.append("ingredients", this.recipe.ingredients);
      formData.append("preparation", this.recipe.preparation);

      axios
        .post("api", formData)
        .then((response) => {
          console.log(response);
        })
        .catch((error) => {
          console.log("error");
        });
      this.recipe = {};
    },
  },
  mounted() {
    axios
      .get("api")
      .then((response) => {
        this.recipes = response.data;
        console.log(this.recipes);
      })
      .catch((error) => {
        console.log("error");
      });
  },
}).mount("#app");
