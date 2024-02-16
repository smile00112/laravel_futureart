<?php

declare(strict_types=1);

namespace App\MoonShine;

use App\MoonShine\Components\DemoVersionComponent;
use MoonShine\Components\Layout\{Content,
    Flash,
    Footer,
    Header,
    LayoutBlock,
    LayoutBuilder,
    Menu,
    Profile,
    Search,
    Sidebar};
use MoonShine\Contracts\MoonShineLayoutContract;

final class MoonShineLayout implements MoonShineLayoutContract
{
    public static function build(): LayoutBuilder
    {
        return LayoutBuilder::make([
            Sidebar::make([
                Menu::make()->customAttributes(['class' => 'mt-2']),
                Profile::make(withBorder: true),
            ]),
            LayoutBlock::make([
                DemoVersionComponent::make(),
                Flash::make(),
                Header::make([
                    Search::make()
                ]),
                Content::make(),
                Footer::make()->copyright(fn (): string => <<<'HTML'
                        &copy; 2021 - 2024  Made with ❤️
                    HTML)->menu([
                   // 'https://moonshine-laravel.com' => 'Documentation',
                ]),
            ])->customAttributes(['class' => 'layout-page']),
        ]);
    }
}
