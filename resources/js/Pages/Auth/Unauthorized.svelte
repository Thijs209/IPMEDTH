<script>
    import Layout from "../../Layouts/Layout.svelte";
</script>

<Layout centeredContent={true}>
    <article class="unauthorized" slot="main">
        <h1>Unauthorized Access</h1>
        <p class="">
            Unfortunately, you do not have the right to view this page. Contact
            your People Manager if you believe this shouldn't be the case.
        </p>
    </article>
</Layout>

<style scoped>
    .unauthorized {
        padding: 2rem;
        display: flex;
        flex-direction: column;
        align-items: start;
        justify-content: center;
        gap: 2rem;
        width: 100%;
        height: 50%;
        min-height: 50rem;
        max-width: 60rem;
        border-radius: 1rem;
    }
</style>
