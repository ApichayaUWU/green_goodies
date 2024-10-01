<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->get('q');  // รับค่า query ที่ส่งมาจาก frontend

        // ค้นหาผลิตภัณฑ์ที่ตรงกับชื่อ หรือหมวดหมู่ที่เกี่ยวข้อง
        $results = Product::where('name', 'LIKE', "%{$query}%")
            ->orWhereHas('category', function($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%");
            })
            ->get();

        return response()->json($results);  // ส่งผลลัพธ์เป็น JSON กลับไปให้ frontend
    }
}


