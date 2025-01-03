<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        for($i=0;$i<5;++$i){
            Product::create([
                'category_id'=>5,
                'name'=>" [New 100%] Laptop Asus Vivobook 15 X1504ZA-NJ582W | Intel Core i3-1215U | 15.6 inch FHD",
                'price'=> 27000000,
                'image'=>" uploads/1733394223-67517f2fd0efe-jpg",
                'content'=>"<h2>Laptop Asus Vivobook 15 x1504za - Chip gen 12th cực khỏe cân mượt mọi tác vụ nhanh chóng</h2><p>&nbsp;</p><p><a href='https://laptop88.vn/new-100-laptop-asus-vivobook-15-x1504za-nj582w-intel-core-i3-1215u-15.6-inch-fhd.html'><strong>Asus Vivobook 15 X1504ZA</strong></a>&nbsp;là chiếc <a href='https://laptop88.vn/may-tinh-xach-tay.html'>laptop</a>/<a href='https://laptop88.vn/may-tinh-xach-tay.html'>máy tính xách tay</a> được thừa hưởng nhiều tính năng nổi bật của dòng <a href='https://laptop88.vn/laptop-asus-vivobook.html'>Asus Vivobook</a>. Với thiết kế sang trọng, bền bỉ cùng một cấu hình khỏe và màn hình đẹp, sắc nét trong tầm giá - chiếc&nbsp;<a href='https://laptop88.vn/laptop-sinh-vien-van-phong.html'>laptop văn phòng</a> này hứa hẹn sẽ mang đến nhiều trải nghiệm tuyệt vời cho người dùng khi sử dụng. Cùng Laptop88 tìm hiểu kỹ hơn về sản phẩm&nbsp;<a href='https://laptop88.vn/laptop-asus.html'>laptop Asus</a> này thông qua nội dung bài viết dưới đây nhé!</p><p>&nbsp;</p><p><i>- Thiết kế siêu bền bỉ, đạt chuẩn quân sự và có màu sắc trắng bạc hút mắt, thời thượng, hiện đại cùng logo in dập nổi cực sang trọng -&nbsp;phù hợp với những bạn trẻ, những người làm trong môi trường văn phòng mong muốn sở hữu một chiếc máy hiện đại, năng động.</i></p><p>&nbsp;</p><p><i>- Cấu hình cực ổn định với chip gen 12, 6 nhân 8 luồng cùng RAM 8GB cực khỏe giúp chạy cực tốt mọi tác vụ văn phòng đơn giản và thậm chí là chơi game HOT, làm đồ họa 2D cũng nhanh chóng, mượt mà.</i></p>",

                'content_short'=>"Laptop Asus Vivobook 15 x1504za - Chip gen 12th cực khỏe cân mượt mọi tác vụ nhanh chóng",
                'role'=>" 1",
                'created_at'=>now(),
                'updated_at'=>now(),
                'status'=>null,
                'chip'=>" I5 12400F",
                'ram'=>" 8G",
                'color'=>"Sivel",
                'memory'=>"512G",
                'screen'=>"15.6 Inch",
                'resolution'=>"2k",
                'is_attributes'=> 2,
                'product_parent'=>null,
                'quantity'=>50,
            ]);}
        for($i=0;$i<5;++$i){
            Product::create([
                'category_id'=>6,
                'name'=>" [New 100%] Laptop Dell Inspiron 14 5445 R1808L - AMD Ryzen 7-8840HS | 16GB | SSD 512GB | 14 inch 2.2K",
                'price'=> 27000000,
                'image'=>" uploads/1733394223-67517f2fd0efe-jpg",
                'content'=>"<h2>Laptop Asus Vivobook 15 x1504za - Chip gen 12th cực khỏe cân mượt mọi tác vụ nhanh chóng</h2><p>&nbsp;</p><p><a href='https://laptop88.vn/new-100-laptop-asus-vivobook-15-x1504za-nj582w-intel-core-i3-1215u-15.6-inch-fhd.html'><strong>Asus Vivobook 15 X1504ZA</strong></a>&nbsp;là chiếc <a href='https://laptop88.vn/may-tinh-xach-tay.html'>laptop</a>/<a href='https://laptop88.vn/may-tinh-xach-tay.html'>máy tính xách tay</a> được thừa hưởng nhiều tính năng nổi bật của dòng <a href='https://laptop88.vn/laptop-asus-vivobook.html'>Asus Vivobook</a>. Với thiết kế sang trọng, bền bỉ cùng một cấu hình khỏe và màn hình đẹp, sắc nét trong tầm giá - chiếc&nbsp;<a href='https://laptop88.vn/laptop-sinh-vien-van-phong.html'>laptop văn phòng</a> này hứa hẹn sẽ mang đến nhiều trải nghiệm tuyệt vời cho người dùng khi sử dụng. Cùng Laptop88 tìm hiểu kỹ hơn về sản phẩm&nbsp;<a href='https://laptop88.vn/laptop-asus.html'>laptop Asus</a> này thông qua nội dung bài viết dưới đây nhé!</p><p>&nbsp;</p><p><i>- Thiết kế siêu bền bỉ, đạt chuẩn quân sự và có màu sắc trắng bạc hút mắt, thời thượng, hiện đại cùng logo in dập nổi cực sang trọng -&nbsp;phù hợp với những bạn trẻ, những người làm trong môi trường văn phòng mong muốn sở hữu một chiếc máy hiện đại, năng động.</i></p><p>&nbsp;</p><p><i>- Cấu hình cực ổn định với chip gen 12, 6 nhân 8 luồng cùng RAM 8GB cực khỏe giúp chạy cực tốt mọi tác vụ văn phòng đơn giản và thậm chí là chơi game HOT, làm đồ họa 2D cũng nhanh chóng, mượt mà.</i></p>",

                'content_short'=>"Dell Inspiron 14 5445: Phiên bản MỚI NHẤT 2024 - Cấu hình siêu KHỦNG chip R7 8840HS đời mới nhất, card AMD Radeon™ 780M cực khỏe",
                'role'=>" 1",
                'created_at'=>now(),
                'updated_at'=>now(),
                'status'=>null,
                'chip'=>" I5 12400F",
                'ram'=>" 8G",
                'color'=>"Black",
                'memory'=>"512G",
                'screen'=>"15.6 Inch",
                'resolution'=>"2k",
                'is_attributes'=> 2,
                'product_parent'=>null,
                'quantity'=>50,
            ]);}
        for($i=0;$i<5;++$i){
            Product::create([
                'category_id'=>7,
                'name'=>" Laptop HP Gaming Victus 16-s0173AX R5-7640HS/16GB/512GB/16' 144Hz/GeForce RTX3050 6GB/Win11_A9LG9PA",
                'price'=> 27000000,
                'image'=>" uploads/1733394223-67517f2fd0efe-jpg",
                'content'=>"<h2>Laptop Asus Vivobook 15 x1504za - Chip gen 12th cực khỏe cân mượt mọi tác vụ nhanh chóng</h2><p>&nbsp;</p><p><a href='https://laptop88.vn/new-100-laptop-asus-vivobook-15-x1504za-nj582w-intel-core-i3-1215u-15.6-inch-fhd.html'><strong>Asus Vivobook 15 X1504ZA</strong></a>&nbsp;là chiếc <a href='https://laptop88.vn/may-tinh-xach-tay.html'>laptop</a>/<a href='https://laptop88.vn/may-tinh-xach-tay.html'>máy tính xách tay</a> được thừa hưởng nhiều tính năng nổi bật của dòng <a href='https://laptop88.vn/laptop-asus-vivobook.html'>Asus Vivobook</a>. Với thiết kế sang trọng, bền bỉ cùng một cấu hình khỏe và màn hình đẹp, sắc nét trong tầm giá - chiếc&nbsp;<a href='https://laptop88.vn/laptop-sinh-vien-van-phong.html'>laptop văn phòng</a> này hứa hẹn sẽ mang đến nhiều trải nghiệm tuyệt vời cho người dùng khi sử dụng. Cùng Laptop88 tìm hiểu kỹ hơn về sản phẩm&nbsp;<a href='https://laptop88.vn/laptop-asus.html'>laptop Asus</a> này thông qua nội dung bài viết dưới đây nhé!</p><p>&nbsp;</p><p><i>- Thiết kế siêu bền bỉ, đạt chuẩn quân sự và có màu sắc trắng bạc hút mắt, thời thượng, hiện đại cùng logo in dập nổi cực sang trọng -&nbsp;phù hợp với những bạn trẻ, những người làm trong môi trường văn phòng mong muốn sở hữu một chiếc máy hiện đại, năng động.</i></p><p>&nbsp;</p><p><i>- Cấu hình cực ổn định với chip gen 12, 6 nhân 8 luồng cùng RAM 8GB cực khỏe giúp chạy cực tốt mọi tác vụ văn phòng đơn giản và thậm chí là chơi game HOT, làm đồ họa 2D cũng nhanh chóng, mượt mà.</i></p>",

                'content_short'=>"Laptop HP Gaming Victus 16-s0173AX R5-7640HS/16GB/512GB/16' 144Hz/GeForce RTX3050 6GB/Win11_A9LG9PA",
                'role'=>" 1",
                'created_at'=>now(),
                'updated_at'=>now(),
                'status'=>null,
                'chip'=>" I5 12400F",
                'ram'=>" 8G",
                'color'=>"Sivel",
                'memory'=>"512G",
                'screen'=>"15.6 Inch",
                'resolution'=>"2k",
                'is_attributes'=>" 2",
                'product_parent'=>null,
                'quantity'=>50,
            ]);}
        for($i=0;$i<5;++$i){
            Product::create([
                'category_id'=>8,
                'name'=>" [New 100%] Laptop Lenovo Gaming LOQ 15IAX9 83GS001CUS - Intel Core i5-12450HX | RAM 12GB | RTX 3050 | 15.6 inch 144Hz 100% sRGB",
                'price'=> 27000000,
                'image'=>" uploads/1733394223-67517f2fd0efe-jpg",
                'content'=>"<h2>Laptop Asus Vivobook 15 x1504za - Chip gen 12th cực khỏe cân mượt mọi tác vụ nhanh chóng</h2><p>&nbsp;</p><p><a href='https://laptop88.vn/new-100-laptop-asus-vivobook-15-x1504za-nj582w-intel-core-i3-1215u-15.6-inch-fhd.html'><strong>Asus Vivobook 15 X1504ZA</strong></a>&nbsp;là chiếc <a href='https://laptop88.vn/may-tinh-xach-tay.html'>laptop</a>/<a href='https://laptop88.vn/may-tinh-xach-tay.html'>máy tính xách tay</a> được thừa hưởng nhiều tính năng nổi bật của dòng <a href='https://laptop88.vn/laptop-asus-vivobook.html'>Asus Vivobook</a>. Với thiết kế sang trọng, bền bỉ cùng một cấu hình khỏe và màn hình đẹp, sắc nét trong tầm giá - chiếc&nbsp;<a href='https://laptop88.vn/laptop-sinh-vien-van-phong.html'>laptop văn phòng</a> này hứa hẹn sẽ mang đến nhiều trải nghiệm tuyệt vời cho người dùng khi sử dụng. Cùng Laptop88 tìm hiểu kỹ hơn về sản phẩm&nbsp;<a href='https://laptop88.vn/laptop-asus.html'>laptop Asus</a> này thông qua nội dung bài viết dưới đây nhé!</p><p>&nbsp;</p><p><i>- Thiết kế siêu bền bỉ, đạt chuẩn quân sự và có màu sắc trắng bạc hút mắt, thời thượng, hiện đại cùng logo in dập nổi cực sang trọng -&nbsp;phù hợp với những bạn trẻ, những người làm trong môi trường văn phòng mong muốn sở hữu một chiếc máy hiện đại, năng động.</i></p><p>&nbsp;</p><p><i>- Cấu hình cực ổn định với chip gen 12, 6 nhân 8 luồng cùng RAM 8GB cực khỏe giúp chạy cực tốt mọi tác vụ văn phòng đơn giản và thậm chí là chơi game HOT, làm đồ họa 2D cũng nhanh chóng, mượt mà.</i></p>",

                'content_short'=>"Laptop Lenovo Gaming LOQ 15IAX9 83GS001CUS - Intel Core i5-12450HX ",
                'role'=>" 1",
                'created_at'=>now(),
                'updated_at'=>now(),
                'status'=>null,
                'chip'=>" I5 12400F",
                'ram'=>" 8G",
                'color'=>"Sivel",
                'memory'=>"512G",
                'screen'=>"15.6 Inch",
                'resolution'=>"2k",
                'is_attributes'=>" 2",
                'product_parent'=>null,
                'quantity'=>50,
            ]);}
        for($i=0;$i<5;++$i){
            Product::create([
                'category_id'=>10,
                'name'=>"[New Outlet] Laptop Acer Nitro 5 AN515-58-57Y8 - Intel Core i5-12500H |16GB | Nvidia RTX 3050Ti | 15.6 Inch Full HD",
                'price'=> 27000000,
                'image'=>" uploads/1733394223-67517f2fd0efe-jpg",
                'content'=>"<h2>Laptop Asus Vivobook 15 x1504za - Chip gen 12th cực khỏe cân mượt mọi tác vụ nhanh chóng</h2><p>&nbsp;</p><p><a href='https://laptop88.vn/new-100-laptop-asus-vivobook-15-x1504za-nj582w-intel-core-i3-1215u-15.6-inch-fhd.html'><strong>Asus Vivobook 15 X1504ZA</strong></a>&nbsp;là chiếc <a href='https://laptop88.vn/may-tinh-xach-tay.html'>laptop</a>/<a href='https://laptop88.vn/may-tinh-xach-tay.html'>máy tính xách tay</a> được thừa hưởng nhiều tính năng nổi bật của dòng <a href='https://laptop88.vn/laptop-asus-vivobook.html'>Asus Vivobook</a>. Với thiết kế sang trọng, bền bỉ cùng một cấu hình khỏe và màn hình đẹp, sắc nét trong tầm giá - chiếc&nbsp;<a href='https://laptop88.vn/laptop-sinh-vien-van-phong.html'>laptop văn phòng</a> này hứa hẹn sẽ mang đến nhiều trải nghiệm tuyệt vời cho người dùng khi sử dụng. Cùng Laptop88 tìm hiểu kỹ hơn về sản phẩm&nbsp;<a href='https://laptop88.vn/laptop-asus.html'>laptop Asus</a> này thông qua nội dung bài viết dưới đây nhé!</p><p>&nbsp;</p><p><i>- Thiết kế siêu bền bỉ, đạt chuẩn quân sự và có màu sắc trắng bạc hút mắt, thời thượng, hiện đại cùng logo in dập nổi cực sang trọng -&nbsp;phù hợp với những bạn trẻ, những người làm trong môi trường văn phòng mong muốn sở hữu một chiếc máy hiện đại, năng động.</i></p><p>&nbsp;</p><p><i>- Cấu hình cực ổn định với chip gen 12, 6 nhân 8 luồng cùng RAM 8GB cực khỏe giúp chạy cực tốt mọi tác vụ văn phòng đơn giản và thậm chí là chơi game HOT, làm đồ họa 2D cũng nhanh chóng, mượt mà.</i></p>",

                'content_short'=>"Laptop Acer Nitro 5 AN515-58-57Y8 ",
                'role'=>" 1",
                'created_at'=>now(),
                'updated_at'=>now(),
                'status'=>null,
                'chip'=>" I5 12400F",
                'ram'=>" 8G",
                'color'=>"Sivel",
                'memory'=>"512G",
                'screen'=>"15.6 Inch",
                'resolution'=>"2k",
                'is_attributes'=>" 2",
                'product_parent'=>null,
                'quantity'=>50,

            ]);
        }
        for($i=0;$i<5;++$i){
            Product::create([
                'category_id'=>9,
                'name'=>"MacBook Air 13 inch M2 2022 8CPU 8GPU 8GB/256GB",
                'price'=> 27000000,
                'image'=>" uploads/1733394223-67517f2fd0efe-jpg",
                'content'=>"<h2>Laptop Asus Vivobook 15 x1504za - Chip gen 12th cực khỏe cân mượt mọi tác vụ nhanh chóng</h2><p>&nbsp;</p><p><a href='https://laptop88.vn/new-100-laptop-asus-vivobook-15-x1504za-nj582w-intel-core-i3-1215u-15.6-inch-fhd.html'><strong>Asus Vivobook 15 X1504ZA</strong></a>&nbsp;là chiếc <a href='https://laptop88.vn/may-tinh-xach-tay.html'>laptop</a>/<a href='https://laptop88.vn/may-tinh-xach-tay.html'>máy tính xách tay</a> được thừa hưởng nhiều tính năng nổi bật của dòng <a href='https://laptop88.vn/laptop-asus-vivobook.html'>Asus Vivobook</a>. Với thiết kế sang trọng, bền bỉ cùng một cấu hình khỏe và màn hình đẹp, sắc nét trong tầm giá - chiếc&nbsp;<a href='https://laptop88.vn/laptop-sinh-vien-van-phong.html'>laptop văn phòng</a> này hứa hẹn sẽ mang đến nhiều trải nghiệm tuyệt vời cho người dùng khi sử dụng. Cùng Laptop88 tìm hiểu kỹ hơn về sản phẩm&nbsp;<a href='https://laptop88.vn/laptop-asus.html'>laptop Asus</a> này thông qua nội dung bài viết dưới đây nhé!</p><p>&nbsp;</p><p><i>- Thiết kế siêu bền bỉ, đạt chuẩn quân sự và có màu sắc trắng bạc hút mắt, thời thượng, hiện đại cùng logo in dập nổi cực sang trọng -&nbsp;phù hợp với những bạn trẻ, những người làm trong môi trường văn phòng mong muốn sở hữu một chiếc máy hiện đại, năng động.</i></p><p>&nbsp;</p><p><i>- Cấu hình cực ổn định với chip gen 12, 6 nhân 8 luồng cùng RAM 8GB cực khỏe giúp chạy cực tốt mọi tác vụ văn phòng đơn giản và thậm chí là chơi game HOT, làm đồ họa 2D cũng nhanh chóng, mượt mà.</i></p>",

                'content_short'=>"MacBook Air 13 inch M2 2022 8CPU 8GPU 8GB/256GB",
                'role'=>" 1",
                'created_at'=>now(),
                'updated_at'=>now(),
                'status'=>null,
                'chip'=>" I5 12400F",
                'ram'=>" 8G",
                'color'=>"Sivel",
                'memory'=>"512G",
                'screen'=>"15.6 Inch",
                'resolution'=>"2k",
                'is_attributes'=>" 2",
                'product_parent'=>null,
                'quantity'=>50,

            ]);
        }
        for($i=0;$i<5;++$i){
            Product::create([
                'category_id'=>11,
                'name'=>"Laptop Samsung Galaxy Book – Máy tính bảng 2 trong 1 tiện lợi",
                'price'=> 27000000,
                'image'=>" uploads/1733394223-67517f2fd0efe-jpg",
                'content'=>"<h2>Laptop Asus Vivobook 15 x1504za - Chip gen 12th cực khỏe cân mượt mọi tác vụ nhanh chóng</h2><p>&nbsp;</p><p><a href='https://laptop88.vn/new-100-laptop-asus-vivobook-15-x1504za-nj582w-intel-core-i3-1215u-15.6-inch-fhd.html'><strong>Asus Vivobook 15 X1504ZA</strong></a>&nbsp;là chiếc <a href='https://laptop88.vn/may-tinh-xach-tay.html'>laptop</a>/<a href='https://laptop88.vn/may-tinh-xach-tay.html'>máy tính xách tay</a> được thừa hưởng nhiều tính năng nổi bật của dòng <a href='https://laptop88.vn/laptop-asus-vivobook.html'>Asus Vivobook</a>. Với thiết kế sang trọng, bền bỉ cùng một cấu hình khỏe và màn hình đẹp, sắc nét trong tầm giá - chiếc&nbsp;<a href='https://laptop88.vn/laptop-sinh-vien-van-phong.html'>laptop văn phòng</a> này hứa hẹn sẽ mang đến nhiều trải nghiệm tuyệt vời cho người dùng khi sử dụng. Cùng Laptop88 tìm hiểu kỹ hơn về sản phẩm&nbsp;<a href='https://laptop88.vn/laptop-asus.html'>laptop Asus</a> này thông qua nội dung bài viết dưới đây nhé!</p><p>&nbsp;</p><p><i>- Thiết kế siêu bền bỉ, đạt chuẩn quân sự và có màu sắc trắng bạc hút mắt, thời thượng, hiện đại cùng logo in dập nổi cực sang trọng -&nbsp;phù hợp với những bạn trẻ, những người làm trong môi trường văn phòng mong muốn sở hữu một chiếc máy hiện đại, năng động.</i></p><p>&nbsp;</p><p><i>- Cấu hình cực ổn định với chip gen 12, 6 nhân 8 luồng cùng RAM 8GB cực khỏe giúp chạy cực tốt mọi tác vụ văn phòng đơn giản và thậm chí là chơi game HOT, làm đồ họa 2D cũng nhanh chóng, mượt mà.</i></p>",

                'content_short'=>"Laptop Samsung Galaxy Book ",
                'role'=>" 1",
                'created_at'=>now(),
                'updated_at'=>now(),
                'status'=>null,
                'chip'=>" I5 12400F",
                'ram'=>" 8G",
                'color'=>"Sivel",
                'memory'=>"512G",
                'screen'=>"15.6 Inch",
                'resolution'=>"2k",
                'is_attributes'=>" 2",
                'product_parent'=>null,
                'quantity'=>50,

            ]);
        }
        for($i=0;$i<5;++$i){
            Product::create([
                'category_id'=>12,
                'name'=>"Laptop gaming MSI Crosshair 16 HX D14VFKG 860VN",
                'price'=> 27000000,
                'image'=>" uploads/1733394223-67517f2fd0efe-jpg",
                'content'=>"<h2>Laptop Asus Vivobook 15 x1504za - Chip gen 12th cực khỏe cân mượt mọi tác vụ nhanh chóng</h2><p>&nbsp;</p><p><a href='https://laptop88.vn/new-100-laptop-asus-vivobook-15-x1504za-nj582w-intel-core-i3-1215u-15.6-inch-fhd.html'><strong>Asus Vivobook 15 X1504ZA</strong></a>&nbsp;là chiếc <a href='https://laptop88.vn/may-tinh-xach-tay.html'>laptop</a>/<a href='https://laptop88.vn/may-tinh-xach-tay.html'>máy tính xách tay</a> được thừa hưởng nhiều tính năng nổi bật của dòng <a href='https://laptop88.vn/laptop-asus-vivobook.html'>Asus Vivobook</a>. Với thiết kế sang trọng, bền bỉ cùng một cấu hình khỏe và màn hình đẹp, sắc nét trong tầm giá - chiếc&nbsp;<a href='https://laptop88.vn/laptop-sinh-vien-van-phong.html'>laptop văn phòng</a> này hứa hẹn sẽ mang đến nhiều trải nghiệm tuyệt vời cho người dùng khi sử dụng. Cùng Laptop88 tìm hiểu kỹ hơn về sản phẩm&nbsp;<a href='https://laptop88.vn/laptop-asus.html'>laptop Asus</a> này thông qua nội dung bài viết dưới đây nhé!</p><p>&nbsp;</p><p><i>- Thiết kế siêu bền bỉ, đạt chuẩn quân sự và có màu sắc trắng bạc hút mắt, thời thượng, hiện đại cùng logo in dập nổi cực sang trọng -&nbsp;phù hợp với những bạn trẻ, những người làm trong môi trường văn phòng mong muốn sở hữu một chiếc máy hiện đại, năng động.</i></p><p>&nbsp;</p><p><i>- Cấu hình cực ổn định với chip gen 12, 6 nhân 8 luồng cùng RAM 8GB cực khỏe giúp chạy cực tốt mọi tác vụ văn phòng đơn giản và thậm chí là chơi game HOT, làm đồ họa 2D cũng nhanh chóng, mượt mà.</i></p>",

                'content_short'=>"Laptop gaming MSI Crosshair 16 HX D14VFKG 860VN ",
                'role'=>" 1",
                'created_at'=>now(),
                'updated_at'=>now(),
                'status'=>null,
                'chip'=>" I5 12400F",
                'ram'=>" 8G",
                'color'=>"Sivel",
                'memory'=>"512G",
                'screen'=>"15.6 Inch",
                'resolution'=>"2k",
                'is_attributes'=>" 2",
                'product_parent'=>null,
                'quantity'=>50,
               
            ]);
        }
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(ProductSeeder::class);

    }
}
