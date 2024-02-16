<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use App\Models\Album;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Foto;
use App\MoonShine\Resources\ArticleResource;
use App\MoonShine\Resources\CommentResource;
use App\MoonShine\Resources\FotoResource;
use MoonShine\Components\ResourcePreview;
use MoonShine\Decorations\Block;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\TextBlock;
use MoonShine\Metrics\DonutChartMetric;
use MoonShine\Metrics\LineChartMetric;
use MoonShine\Metrics\ValueMetric;
use MoonShine\Pages\Page;

class Dashboard extends Page
{
    public function breadcrumbs(): array
    {
        return [
            '#' => $this->title()
        ];
    }

    public function title(): string
    {
        return 'Панель утправления';
    }

    public function components(): array
	{
		return [
//            TextBlock::make(
//                'Welcome to MoonShine!',
//                'Demo version'
//            ),

            Grid::make([
                Column::make([
                    ValueMetric::make('Категорий')
                        ->value(Category::query()->count()),
                ])->columnSpan(6),
                Column::make([
                    ValueMetric::make('Альбомов')
                        ->value(Album::query()->count()),
                ])->columnSpan(6),

//                Column::make([
//                    ValueMetric::make('Comments')
//                        ->value(Comment::query()->count()),
//                ])->columnSpan(6),
//
//                Column::make([
//                    DonutChartMetric::make('Подписчики')
//                        ->columnSpan(6)
//                        ->values(['CutCode' => 10000, 'Apple' => 9999]),
//                ])->columnSpan(6),

//                Column::make([
//                    LineChartMetric::make('Заказы')
//                        ->line([
//                            'Выручка 1' => [
//                                now()->format('Y-m-d') => 100,
//                                now()->addDay()->format('Y-m-d') => 200
//                            ]
//                        ])
//                        ->line([
//                            'Выручка 2' => [
//                                now()->format('Y-m-d') => 300,
//                                now()->addDay()->format('Y-m-d') => 400
//                            ]
//                        ], '#EC4176'),
//                ])->columnSpan(6)

            ]),

            Grid::make([
                Column::make([
                    ResourcePreview::make(
                        new FotoResource(),
                        function () {
                            return Foto::query()->limit(10)->orderBy('id', 'desc');
                        }

                    //Foto::query()->limit(10)->orderBy('id', 'desc')

                    )
                ])->columnSpan(12),
            ]),
        ];
	}
}
