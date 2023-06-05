<script>
    import { inertia, page } from "@inertiajs/svelte";
    import Layout from "../Layouts/Layout.svelte";
    console.log($page.props.auth.user);
    console.log($page.props);
</script>

<Layout centeredContent={true}>
    <article class="welcome-page" slot="main">
        {#if $page.props.auth.user}
            <h2>
                Welcome! You're signed in as {$page.props.auth.user.first_name}!
                Your role is {String(
                    $page.props.auth.user.role.name
                ).toLowerCase()}.
            </h2>
            <button
                class="button button--logout"
                use:inertia={{ href: "/logout", method: "post" }}
                type="button">Logout</button
            >
        {:else}
            <h2>Welcome! You're not signed in.</h2>
            <div class="buttons">
                <button
                    class="button"
                    use:inertia={{ href: "/login", method: "get" }}
                    type="button">Login</button
                >
                <button
                    class="button"
                    use:inertia={{ href: "/register", method: "get" }}
                    type="button">Register</button
                >
            </div>
        {/if}
    </article>
</Layout>

<style>
    .welcome-page {
        width: 50%;
        height: 100%;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 1rem;
    }

    .button--logout {
        margin: 1rem;
        align-self: center;
        color: var(--c-alert);
        background-color: #fff;
    }

    .buttons {
        width: 50%;
        align-self: center;
        display: flex;
        justify-content: start;
        align-items: center;
        gap: 1rem;
    }

    .button {
        display: flex;
        justify-content: center;
        align-items: center;

        height: 3rem;
        width: 100%;
        max-width: 20rem;
        align-self: center;

        font-size: 1.6rem;
        color: #eee;

        border-radius: 0.5rem;
        border: 1px solid #ccc;
        padding: 2rem;

        background-color: var(--c-primary-button);
    }
    .button:hover {
        background-color: var(--c-primary-button-hover);
        color: #fff;
        cursor: pointer;
    }
</style>
