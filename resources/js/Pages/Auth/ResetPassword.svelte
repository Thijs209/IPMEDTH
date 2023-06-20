<script>
    import Layout from "./../../Layouts/Layout.svelte";
    import { useForm, page } from "@inertiajs/svelte";

    // The url is in the form of /reset-password/{token}?email={email}
    const token = $page.url.split("/")[2].split("?")[0];
    let email = decodeURIComponent($page.url.split("/")[2].split("?email=")[1]);
    console.log($page);

    let form = useForm({
        email: email,
        password: "",
        password_confirmation: "",
        token: token,
    });

    let message = null``;

    function submit() {
        $form.post("/reset-password", {
            onsuccess: () => {
                message =
                    "Je wachtwoord is succesvol gewijzigd, je kan nu inloggen.";
            },
            onfinish: () => {
                $page.visit("/login");
            },
        });
    }
</script>

<Layout centeredContent={true}>
    <article class="reset-password" slot="main">
        <h2 class="reset-password__heading">Wachtwoord reset</h2>
        <form
            action="/reset-password"
            method="post"
            on:submit|preventDefault={submit}
        >
            <div class="form__group">
                <label class="form__label" for="password">Wachtwoord</label>
                <input
                    id="password"
                    required
                    class="form__input"
                    type="password"
                    bind:value={$form.password}
                />
                {#if $form.errors.password}
                    <div class="form__error">{$form.errors.password}</div>
                {/if}
            </div>
            <div class="form__group">
                <label class="form__label" for="password_confirmation"
                    >Bevestig wachtwoord</label
                >
                <input
                    id="password_confirmation"
                    required
                    class="form__input"
                    type="password"
                    bind:value={$form.password_confirmation}
                />
                {#if $form.errors.password_confirmation}
                    <div class="form__error">
                        {$form.errors.password_confirmation}
                    </div>
                {/if}
            </div>
            <button
                required
                class="form__button"
                type="submit"
                disabled={$form.processing}>Verzend</button
            >
        </form>
        {#if message}
            <div class="form__success">message</div>
        {/if}
    </article>
</Layout>

<style>
    :root {
        --max-width-form-elements: 60rem;
    }

    .reset-password {
        font-size: 1.6rem;
        min-width: rem;
        width: 100%;
        max-width: 40rem;
        gap: 4rem;
        padding: 2rem;
        background-color: rgba(250, 250, 250);
        border-radius: 1rem;
        box-shadow: 0 0 1rem rgba(0, 0, 0, 0.2);
    }

    .reset-password__heading {
        display: flex;
        width: 100%;
        height: 4rem;
        font-size: 2.4rem;
        margin-bottom: 2rem;
        justify-content: start;
        align-items: center;
    }

    .form {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 100%;
        gap: 1rem;
    }

    .form__error {
        background-color: var(--c-alert);
        width: 100%;
        color: var(--c-alert-font);
        padding: 1rem;
        font-size: 1.6rem;
        border-bottom-left-radius: 1rem;
        border-bottom-right-radius: 1rem;
        /* font-size: 1.8rem; */
    }

    .form__success {
        background-color: none;
        color: var(--color-arcady-green);
        margin-top: 1rem;
        padding: 1rem;
        font-size: 1.6rem;
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
</style>
