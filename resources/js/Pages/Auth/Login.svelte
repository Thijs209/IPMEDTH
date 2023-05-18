<script>
    import { useForm, page } from "@inertiajs/svelte";

    let form = useForm({
        email: null,
        password: null,
        remember: false,
    });

    function submit() {
        $form.post("/login", {
            onsuccess: () => {
                $page.visit($page.props.auth.user ? "/home" : "/login");
            },
        });
    }
</script>

<main class="page">
    <article class="login">
        <h2 class="login__heading">Login Page</h2>
        <form class="form" on:submit|preventDefault={submit}>
            <div class="form__group">
                <label class="form__label" for="email">Email</label>
                <input
                    class="form__input"
                    type="text"
                    bind:value={$form.email}
                />
                {#if $form.errors.email}
                    <div class="form-error">{$form.errors.email}</div>
                {/if}
            </div>

            <div class="form__group">
                <label class="form__label" for="password">Password</label>
                <input
                    class="form__input"
                    type="password"
                    bind:value={$form.password}
                />
                {#if $form.errors.password}
                    <div class="form-error">{$form.errors.password}</div>
                {/if}
            </div>
            <div class="form__group form__group--checkbox">
                <label class="form__label" for="remember">Remember me</label>
                <input
                    class="form__checkbox"
                    type="checkbox"
                    bind:checked={$form.remember}
                />
            </div>
            <button
                class="form__button"
                type="submit"
                disabled={$form.processing}>Login</button
            >
        </form>
    </article>
</main>

<style>
    .page {
        height: 100vh;
        width: 100vw;
        background-color: #eee;
        display: flex;

        justify-content: center;
        align-items: center;
    }

    .login {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;

        min-width: 30rem;
        gap: 2rem;
        padding: 2rem;
        background-color: #fff;
        justify-self: center;
        align-self: center;
    }
    .form {
        height: auto;
        display: flex;
        flex-flow: column nowrap;
        justify-content: center;
        align-items: center;
    }

    .form__group {
        display: flex;
        flex-flow: column wrap;
        width: 100%;
        align-self: center;
        justify-content: center;
        align-items: center;
        margin-bottom: 1rem;
    }

    .form__group--checkbox {
        align-self: flex-start;
        flex-flow: row wrap;
        gap: 2rem;
    }

    .form__label {
        display: flex;
        height: 2rem;
        align-self: flex-start;
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .form__input {
        width: 100%;
        height: 3rem;
        border-radius: 0.5rem;
        border: 1px solid #ccc;
        padding: 0 1rem;
        font-size: 1.5rem;
    }

    .form__checkbox {
        width: 1.5rem;
        height: 1.5rem;
        align-self: start;
    }
    .form__button {
        width: 100%;
        align-self: center;
        height: 3rem;
        border-radius: 0.5rem;
        border: 1px solid #ccc;
        padding: 0 1rem;
        font-size: 1.5rem;
        background-color: var(--c-primary-button);
        color: #fff;
    }

    .form__button:hover {
        background-color: var(--c-primary-button-hover);
        cursor: pointer;
    }
</style>
