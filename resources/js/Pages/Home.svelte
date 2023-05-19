<script>
    import { inertia, Link, page } from "@inertiajs/svelte";
    let user = "World"; //
    console.log($page.props.auth.user);
</script>

<header class="header">
    <h1 class="header__heading">Home</h1>
</header>
<main class="home-page">
    {#if $page.props.auth.user}
        <h2>
            Welcome! You're signed in as {$page.props.auth.user.first_name}!
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
</main>

<style>
    .home-page {
        width: 100%;
        margin: 0 auto;
    }
    .header {
        height: 20%;
        width: 100%;
        background-color: var(--c-nav-bg);
        color: var(--c-nav-font);
    }

    .header__heading {
        font-size: 3rem;
        font-weight: 700;
        margin-bottom: 1rem;
    }

    .header__nav {
        display: flex;

        justify-content: space-between;
        align-items: center;
    }

    .header__items {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .header__item {
        list-style: none;
        margin-right: 1rem;
    }

    .header__link {
        z-index: 2;
        text-decoration: none;
        color: var(--c-nav-font);
        font-size: 1.2rem;
        font-weight: 700;
    }

    .header__link:visited {
        color: var(--nav-font);
    }

    .header__link--login {
        background-color: var(--arcady-green);
        color: #fff;
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
    }

    .header__link--logout {
        background-color: #000;
        color: #fff;
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
        border: none;
    }

    .header__link--logout:hover {
        background-color: #fff;
        color: var(--c-alert-hover);
        cursor: pointer;
    }

    .header__link--login:hover {
        background-color: #fff;
        color: #000;
    }

    .header__link:hover {
        color: #fff;
        background-color: #000;
    }

    .button--logout {
        margin: 1rem;
        align-self: center;
        color: var(--c-alert);
        background-color: #fff;
    }

    .buttons {
        width: 50%;
        align-self: start;
        display: flex;
        justify-content: start;
        align-items: center;
        gap: 1rem;
        padding: 1rem;
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
