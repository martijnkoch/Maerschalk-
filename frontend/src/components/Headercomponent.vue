<template>
    <b-container fluid class="header-nav">
        <b-nav fill tabs>
        <b-col lg="6" class="mt-4">
            <b-form-input
            class="header-search"
            id="inputFormatter"
            type="text"
            placeholder="Zoeken"
            aria-describedby="inputFormatterHelp"
            />
        </b-col>
        </b-nav>
    </b-container>
</template>

<script>
export default {
  name: 'app',
  components: {
    
  }
}
</script>