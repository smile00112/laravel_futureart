<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Album;

use MoonShine\ActionButtons\ActionButton;
use MoonShine\Decorations\Collapse;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Flex;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\Heading;
use MoonShine\Decorations\LineBreak;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Fields\Color;
use MoonShine\Fields\File;
use MoonShine\Fields\Image;
use MoonShine\Fields\Json;
use MoonShine\Fields\Number;
use MoonShine\Fields\Preview;
use MoonShine\Fields\RangeSlider;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Relationships\BelongsToMany;
use MoonShine\Fields\Relationships\HasMany;
use MoonShine\Fields\Relationships\HasOne;
use MoonShine\Fields\Slug;
use MoonShine\Fields\StackFields;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Text;
use MoonShine\Fields\TinyMce;
use MoonShine\Fields\Url;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Resources\MoonShineUserResource;

/**
 * @extends ModelResource<Album>
 */
class AlbumResource extends ModelResource
{
    protected string $model = Album::class;

    protected string $title = 'Альбомы';
    public string $column = 'title';
    public string $sortColumn = 'created_at';

//    public bool $withPolicy = true;
//
//    public array $with = [
//        'fotos',
//    ];

    public function fields(): array
    {
        return [
                ID::make()
                    ->useOnImport()
                    ->showOnExport()
                    ->sortable(),

            Grid::make([
                Column::make([
                    Block::make('Main information', [
//                        ActionButton::make(
//                            'Link to article',
//                            $this->getItem()?->getKey() ? route('articles.show', $this->getItem()) : '/',
//                        )
//                            ->icon('heroicons.outline.paper-clip')
//                            ->blank(),

                        LineBreak::make(),

//                        BelongsTo::make('Author', resource: new MoonShineUserResource())
//                            ->asyncSearch()
//                            ->canSee(fn () => auth()->user()->moonshine_user_role_id === 1)
//                            ->required(),

//                        Number::make('Фото', 'comments_count')
//                            ->hideOnForm(),

                        Collapse::make('Title/Slug', [
                            Heading::make('Название/Slug'),

                            Flex::make('flex-titles', [
                                Text::make('Название', 'title')
                                    ->withoutWrapper()
                                    ->required(),

                                Slug::make('Slug')
                                    ->from('title')
                                    ->unique()
                                    ->separator('-')
                                    ->hideOnIndex()
                                    ->withoutWrapper(),
                                   // ->required(),
                            ])
                                ->justifyAlign('start')
                                ->itemsAlign('start'),
                        ]),

                        StackFields::make('Files')->fields([
//                            Image::make('Thumbnail')
//                                ->removable()
//                                ->disk('public')
//                                ->dir('articles'),

//                            File::make('Files')
//                                ->disk('public')
//                                ->multiple()
//                                ->removable()
//                                ->dir('articles'),
                        ]),

                        Preview::make('No input field', 'no_input', static fn () => fake()->realText())
                            ->hideOnIndex(),


//                        RangeSlider::make('Age')
//                            ->min(0)
//                            ->max(60)
//                            ->step(1)
//                            ->fromTo('age_from', 'age_to'),

//                        Number::make('Rating')
//                            ->hint('From 0 to 5')
//                            ->min(0)
//                            ->max(5)
//                            ->link('https://cutcode.dev', 'CutCode', blank: true)
//                            ->stars(),

//                        Url::make('Link')
//                            ->hint('Url')
//                            ->link('https://cutcode.dev', 'CutCode', blank: true)
//                            ->expansion('url'),

//                        Color::make('Color'),

                        //Code::make('Code'),

//                        Json::make('Data')->fields([
//                            Text::make('Title'),
//                            Text::make('Value'),
//                        ])->creatable()->removable(),

                      //  Switcher::make('Вкл/Выкл', 'status'),
                    ]),
                ])->columnSpan(6),

                Column::make([
                    Block::make('Seo and categories', [

                        BelongsTo::make('Категория', 'category')
                            //->asyncSearch()
                            ->hideOnIndex(),
//                        Tabs::make([
////                            Tab::make('Seo', [
////                                Text::make('Seo title')
////                                    ->withoutWrapper()
////                                    ->hideOnIndex(),
////
////                                Text::make('Seo description')
////                                    ->withoutWrapper()
////                                    ->hideOnIndex(),
////
////                                TinyMce::make('Description')
////                                    ->commentAuthor('Danil Shutsky')
////                                    ->addPlugins('code codesample')
////                                    ->addToolbar(' | code codesample')
////                                    ->required()
////                                    ->hideOnIndex(),
////                            ]),
//
//                            Tab::make('Categories', [
//                                BelongsToMany::make('Categories')
//                                    ->tree('category_id')
//                                    ->hideOnIndex(),
//                            ]),
//                        ]),
                    ]),
                ])->columnSpan(6),
            ]),

            HasMany::make('Фото', 'fotos', resource: new FotoResource())
                ->async()
                ->creatable()
               // ->hideOnDetail()
                ->hideOnIndex(),


//            HasOne::make('Comment', resource: new CommentResource())
//                ->async()
//                ->hideOnDetail()
//                ->hideOnIndex(),
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }
}
