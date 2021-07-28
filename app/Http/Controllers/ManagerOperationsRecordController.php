<?php


namespace App\Http\Controllers;


use App\Models\ManagerOperationsRecord;
use App\Models\Measure;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use phpDocumentor\Reflection\Types\Void_;
use PhpParser\Builder\Function_;
use Yajra\DataTables\Exceptions\Exception;

class ManagerOperationsRecordController
{
    public static function storeLog(String $operation,  $func, int $id){
        try {
            DB::beginTransaction();

            //some code
            $actionRecord = new ManagerOperationsRecord();
            $actionRecord->man_id = auth()->id();
            $actionRecord->man_oper_date = Carbon::now()->toDateString();
            $actionRecord->man_oper_time = Carbon::now()->toTimeString();
            $actionRecord->man_operation = $operation;
            $max = ManagerOperationsRecord::orderBy("fakeId", 'desc')->first(); // gets the whole row
            $maxFakeId = $max ? $max->fakeId + 1 : 1;
            $actionRecord->fakeId = $maxFakeId;

            $func($id);
            $actionRecord->save();

        } catch (InputValidationFailedException $e) {
            DB::rollback();

            Log::info('User Validation Failed! ');
            throw $e;
        } catch
        (Exception $e) {
            DB::rollback();

            Log::error('Server Error at UsersController!');
            throw $e;
        }
        DB::commit();
    }



}
