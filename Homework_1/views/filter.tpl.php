<form action="#" method="post" class="search-form" @submit.prevent="$parent.$refs.products.filter(userSearch)">
    <input v-model="userSearch" type="text" class="search-field">
    <button class="btn-search" type="submit">
        <i class="fas fa-search"></i>
    </button>
</form>
