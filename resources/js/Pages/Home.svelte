<script>
    import { page } from "@inertiajs/svelte";
    let user = "World"; //
    console.log($page.props.auth.user);
</script>

<div>
    {#if $page.props.auth.user}
        <h1>
            Welcome! You're signed in as {$page.props.auth.user.first_name}!
        </h1>
    {:else}
        <h1>Welcome! You're not signed in.</h1>
    {/if}
</div>
