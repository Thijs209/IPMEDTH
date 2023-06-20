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
                Je bent ingelogd als: {$page.props.auth.user.first_name +
                    " " +
                    $page.props.auth.user.last_name}. <br />
                De rol van dit account is:
                {String($page.props.auth.user.role.name).toLowerCase()}.
            </h2>
            <div class="buttons">
                <button
                    class="button"
                    use:inertia={{ href: "/create-pop", method: "get" }}
                    type="button">Pop Aanmaken</button
                >
                <button
                    class="button"
                    use:inertia={{
                        href: "/evaluation-overview",
                        method: "get",
                    }}
                    type="button">People Manager Overzicht</button
                >
                <button
                    class="button button--logout"
                    use:inertia={{ href: "/logout", method: "post" }}
                    type="button">Uitloggen</button
                >
            </div>
        {:else}
            <h2>POP testpagina</h2>
            <div class="buttons">
                <button
                    class="button"
                    use:inertia={{ href: "/login", method: "get" }}
                    type="button">Login</button
                >
                <button
                    class="button"
                    use:inertia={{ href: "/register", method: "get" }}
                    type="button">Registreer</button
                >

                <button
                    class="button"
                    use:inertia={{ href: "/forgot-password", method: "get" }}
                    type="button">Wachtwoord Reset</button
                >
            </div>
        {/if}
    </article>
</Layout>

<style>
    .welcome-page {
        width: 100%;
        height: 100%;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 1rem;
    }

    .button--logout {
        align-self: center;
        color: #fff;
        background-color: var(--c-attention);
    }

    .buttons {
        width: 100%;
        align-self: center;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 2rem;
        gap: 2rem;
    }

    .button {
        display: flex;
        justify-content: center;
        align-items: center;

        height: 5rem;
        width: 100%;
        max-width: 20rem;
        align-self: center;

        font-weight: 500;
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
