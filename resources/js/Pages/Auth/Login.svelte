<script>
    import { page, useForm, Link } from "@inertiajs/svelte";
    import Layout from "./../../Layouts/Layout.svelte";

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

<Layout centeredContent={true}>
    <article class="login" slot="main">
        <h2 class="login__heading">Login</h2>
        <form class="form" on:submit|preventDefault={submit}>
            <div class="form__group">
                <label class="form__label" for="email">Email</label>
                <input
                    id="email"
                    class="form__input"
                    type="text"
                    bind:value={$form.email}
                />
                {#if $form.errors.email}
                    <div class="form__error">{$form.errors.email}</div>
                {/if}
            </div>

            <div class="form__group">
                <label class="form__label" for="password">Password</label>
                <input
                    id="password"
                    class="form__input"
                    type="password"
                    bind:value={$form.password}
                />
                {#if $form.errors.password}
                    <div class="form__error">{$form.errors.password}</div>
                {/if}
            </div>
            <div class="form__group form__group--checkbox">
                <label class="form__label" for="remember"
                    >Onthoud gegevens</label
                >
                <input
                    id="remember"
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
        <div class="login__password-reset">
            <Link href="/forgot-password">Wachtwoord vergeten?</Link>
        </div>
    </article>
</Layout>

<style scoped>
    :root {
        --max-width-form-elements: 60rem;
    }

    .login {
        min-width: 40rem;
        width: 40%;
        gap: 4rem;
        padding: 2rem;
        background-color: rgba(250, 250, 250);
        border-radius: 1rem;
        box-shadow: 0 0 1rem rgba(0, 0, 0, 0.2);
    }

    .login__heading {
        display: flex;
        width: 100%;
        height: 4rem;
        margin-bottom: 2rem;
        justify-content: start;
        align-items: center;
    }

    .login__password-reset {
        display: flex;
        justify-content: center;
        width: 100%;
        padding: 2rem 3rem;

        margin: 0 auto;
        height: 100%;
    }

    .form {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 100%;
        gap: 1rem;
    }

    .form__group {
        display: flex;
        flex-direction: column;
        width: 100%;

        max-width: var(--max-width-form-elements);
        align-self: center;
        justify-content: start;
        align-items: start;
        margin-bottom: 1rem;
    }

    .form__group--checkbox {
        max-width: var(--max-width-form-elements);
        gap: 2rem;
        height: 4rem;
        flex-flow: row nowrap;
    }

    .form__label {
        display: flex;
        height: 2rem;
        width: 100%;

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
        align-self: start;
    }

    .form__checkbox {
        display: flex;
        height: 100%;
        width: 100%;
        max-width: 2rem;
        max-height: 2rem;
    }
    .form__button {
        margin-top: 1rem;
        width: 100%;
        align-self: center;
        height: 4rem;
        border-radius: 0.5rem;
        border: 1px solid #ccc;
        padding: 0 1rem;
        font-size: 1.6rem;
        background-color: var(--c-primary-button);
        color: #fff;
        max-width: var(--max-width-form-elements);
    }

    .form__button:disabled {
        background-color: #ccc;
    }

    .form__button:hover {
        background-color: var(--c-primary-button-hover);
        cursor: pointer;
    }

    .form__error {
        background-color: var(--c-alert);
        width: 100%;
        color: var(--c-alert-font);
        padding: 1rem;
        border-bottom-left-radius: 1rem;
        border-bottom-right-radius: 1rem;
        font-size: 1.6rem;
    }

    .form__success {
        background-color: none;
        color: var(--color-arcady-green);
        margin-top: 1rem;
        padding: 1rem;
        font-size: 1.6rem;
    }
</style>
