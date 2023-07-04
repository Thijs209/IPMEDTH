<script lang="ts">
    export let name: String = "Karin Tonneman";
    export let circle: String = "Frontend Circle";
    export let peopleManager: String = "Jeroen van der Velden";
    export let lastEvaluation: String = "04-01-2023";
</script>

<article class="profile">
    <div class="profile__main">
        <figure>
            <!-- <img src="" alt="A profile image of {name}" /> -->
            <!--FIXME fix proper image routing for user profile -->
            <img
                src="https://picsum.photos/200"
                alt="A profile image of {name}"
            />
            <figcaption>
                <p class="u-bold">
                    {name ? name : "Karin Tonneman"}
                </p>
                <p>{circle}</p>
            </figcaption>
        </figure>
    </div>
    <div class="separator" />
    <div class="profile__people-manager">
        <p class="u-bold">People Manager:</p>
        <p>{peopleManager}</p>
    </div>
    <div class="profile__last-evaluation">
        <p class="u-bold">Laatste evaluatie:</p>
        <p>{lastEvaluation}</p>
    </div>
</article>

<style>
    /* Main container */
    .profile {
        height: 100%;
        width: 100%;
        min-width: 15rem;
        padding: 1rem;

        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 1rem;

        background-color: var(--c-nav-bg);
        border-radius: 1rem;
        color: var(--c-nav-font);

        font-size: 1.1rem;
        text-align: center;
    }

    /* User: profileImage, name, circle */

    .profile__main {
        display: flex;
        flex-direction: column;
        height: 15%;
        min-height: 15rem;
        border-bottom: 1px solid var(--c-nav-font);
    }

    /* profileImage */
    .profile__main > figure {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 1rem;
        min-height: 4rem;
        min-width: 4rem;
        height: 100%;
        width: 100%;
    }

    figure > img {
        width: 60%;
        height: 60%;
        min-width: 60%;
        max-height: 2rem;
        min-height: 2rem;
        max-height: 60%;

        object-fit: cover;
        border-radius: 50%;
    }

    figcaption {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .profile__name {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100%;
    }

    .profile__people-manager {
        width: 100%;
        height: 80%;
    }

    .profile__last-evaluation {
        justify-self: end;
        width: 100%;
    }

    .u-bold {
        font-weight: bold;
    }
</style>
