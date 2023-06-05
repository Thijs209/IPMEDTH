<script>
    import { page, useForm } from "@inertiajs/svelte";
    import Layout from "./../../Layouts/Layout.svelte";

    let form = useForm({
        email: null,
    });

    function submit() {
        $form.post("/forgot-password", {
            onsuccess: () => {
                $page.visit($page.props.auth.user ? "/home" : "/login");
            },
        });
    }
</script>

<Layout centeredContent={true}>
    <article class="forgot-password" slot="main">
        <h2 class="forgot-password__heading">Password reset request</h2>
        <form class="form" on:submit|preventDefault={submit}>
            //TODO add mailpit to send email
            <div class="form__group">
                <label class="form__label" for="email">Email</label>
                <input
                    id="email"
                    class="form__input"
                    type="text"
                    bind:value={$form.email}
                />
                {#if $form.errors.email}
                    <div class="form-error">{$form.errors.email}</div>
                {/if}
            </div>
            <button
                class="form__button"
                type="submit"
                disabled={$form.processing}>Send reset link</button
            >
        </form>
    </article>
</Layout>

<style scoped>
    :root {
        --max-width-form-elements: 60rem;
    }

    .forgot-password {
        min-width: rem;
        width: 40%;
        gap: 4rem;
        padding: 2rem;
        background-color: #fff;
    }

    .forgot-password__heading {
        display: flex;
        width: 100%;
        height: 4rem;
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
