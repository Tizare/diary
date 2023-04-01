@extends('layouts.main')
@section('content')

<main>
    <section class="about">
        <div class="about-photo">
            <img src="{{ asset('assets\img\avatar.jpg') }}" alt="">
        </div>
        <div class="about-info">
            <h1>Катя Иванова</h1>
            <p>Москва</p>
            <p>30 лет</p>
            <div class="about-status">"в ожидании чуда"</div>
        </div>

    </section>

    <section class="post align">

        <div class="post-create">
            <a href="" class="post-button">создать новый пост</a>
            <a href="" class="post-button">вклеить фото</a>
        </div>
        <div class="post-posts">
            <div class="block">
                <div class="block-bant pinkbant">
                    <img src="{{ asset('assets\img\bantpink.png') }}" alt="">
                </div>
                <div class="block-card pink">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates necessitatibus saepe ab suscipit, ad iusto molestiae aliquam culpa autem, animi obcaecati natus veniam velit fugiat cumque amet alias. Minus, vero?
                        Nam, nihil laborum dolorem repudiandae asperiores facilis corporis fuga deleniti quisquam hic ipsum adipisci enim reprehenderit. Deleniti ipsam reiciendis ducimus aspernatur, enim culpa nisi modi eveniet labore pariatur, aperiam sint?
                        Veniam architecto accusantium iusto fugiat quia, inventore iste quam quo minus. Esse consequuntur, eligendi distinctio odit placeat inventore molestiae consectetur eum nostrum reprehenderit aspernatur, libero accusamus molestias commodi repellat sit?
                        Dolorum iste ipsum neque at ut consequatur. Dolorum rem non officiis, incidunt sunt cupiditate itaque quibusdam omnis optio repellat numquam eaque corrupti neque maiores sit a amet aperiam! A, alias.
                        Atque molestiae eveniet harum repudiandae ipsa, repellat beatae rem facilis facere consequuntur earum impedit nihil alias dolor laudantium incidunt laboriosam commodi, maiores optio officia. Atque ratione porro perferendis? Ullam, labore.
                    </p>
                </div>
            </div>
            <div class="block">
                <div class="block-bant bluebant">
                    <img src="{{ asset('assets\img\bantblue.png') }}" alt="">
                </div>
                <div class="block-card blue">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum assumenda quibusdam molestiae! Sint quasi necessitatibus illo modi neque facere cum rem, nihil, labore veniam inventore quaerat odio voluptatibus, ad ut!</p>
                </div>
            </div>
            <div class="block">
                <div class="block-bant beigebant">
                    <img src="{{ asset('assets\img\bantneutral.png') }}" alt="">
                </div>
                <div class="block-card beige">
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis numquam odio accusamus dolore, minus, magnam laudantium tenetur sint repellat a laboriosam fuga porro perferendis, earum rerum natus! Amet, laboriosam commodi?
                        Quia vitae vel voluptatibus officiis aliquam magni aperiam doloremque temporibus, iusto pariatur at dicta sequi id laudantium, amet quisquam ut dolor quos provident minus sapiente dolores enim. Tenetur, excepturi velit.</p>
                </div>
            </div>
        </div>

    </section>
</main>

<footer class="align">
    <img src="{{ asset('assets\img\slash.png') }}" alt="">
    <div><a href="#top">вверх</a></div>
</footer>
@endsection

