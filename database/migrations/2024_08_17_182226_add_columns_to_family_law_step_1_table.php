<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('family_law_step_1', function (Blueprint $table) {


            $table->json('case_ground')->nullable();

            $table->string('full_name')->nullable();
            $table->date('dob')->nullable();
            $table->string('birth_place')->nullable();

            $table->string('current_address')->nullable();
            $table->string('residence_telephone')->nullable();
            $table->string('mobile_telephone')->nullable();
            $table->string('email')->nullable();

            $table->string('employer')->nullable();
            $table->string('job_title')->nullable();
            $table->string('employer_address')->nullable();
            $table->string('employer_telephone')->nullable();
            $table->decimal('monthly_salary', 10, 2)->nullable();
            $table->decimal('annual_salary', 10, 2)->nullable();    
            $table->integer('length_of_employment')->nullable();
            $table->string('education')->nullable();

            $table->string('spouse_full_name')->nullable();
            $table->date('spouse_dob')->nullable();
            $table->string('spouse_birth_place')->nullable();
            $table->string('spouse_social_security')->nullable();
            $table->string('spouse_drivers_license')->nullable();
            
            $table->string('spouse_current_address')->nullable();
            $table->string('spouse_residence_telephone')->nullable();
            $table->string('spouse_mobile_telephone')->nullable();
            $table->string('spouse_email')->nullable();

            $table->string('spouse_employer')->nullable();
            $table->string('spouse_job_title')->nullable();
            $table->string('spouse_employer_address')->nullable();
            $table->string('spouse_employer_telephone')->nullable();
            $table->decimal('spouse_monthly_salary', 10, 2)->nullable();
            $table->decimal('spouse_annual_salary', 10, 2)->nullable();
            $table->integer('spouse_length_of_employment')->nullable();
            $table->string('spouse_education')->nullable(); 

            $table->date('marriage_date')->nullable();
            $table->string('marriage_place')->nullable();
            $table->date('separation_date')->nullable();

            $table->json('children_details')->nullable();

            $table->string('name_insurance_company')->nullable();
            $table->string('insurance_group_number')->nullable();
            $table->string('insurance_party_responsible')->nullable();
            $table->decimal('insurance_monthly_cost', 10, 2)->nullable();
            $table->string('insurance_covered_by_parent_employment')->nullable();

            $table->string('children_custody_dispute')->nullable();
            $table->string('children_custody_holder')->nullable();
            
            $table->string('special_needs')->nullable();
            $table->string('religious_issues')->nullable();
            
            $table->integer('previous_marriages')->default(0);
            
            $table->string('grounds_for_divorce')->nullable();
            
            $table->json('children_from_previous_relationships')->nullable();
            
            $table->string('retirement_pension_savings_plans')->nullable();
            $table->string('spouse_retirement_pension_savings_plans')->nullable();
            $table->string('file_attachment')->nullable();

            $table->text('feedback')->nullable();
            $table->decimal('marks',5,2)->nullable();
    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('family_law_step_1', function (Blueprint $table) {
            // Drop columns in reverse order of addition to avoid dependency issues
            $table->dropColumn([
                'marks',
                'feedback',
                'file_attachment',
                'spouse_retirement_pension_savings_plans',
                'retirement_pension_savings_plans',
                'children_from_previous_relationships',
                'grounds_for_divorce',
                'previous_marriages',
                'religious_issues',
                'special_needs',
                'children_custody_holder',
                'children_custody_dispute',
                'insurance_covered_by_parent_employment',
                'insurance_monthly_cost',
                'insurance_party_responsible',
                'insurance_group_number',
                'name_insurance_company',
                'children_details',
                'separation_date',
                'marriage_place',
                'marriage_date',
                'spouse_education',
                'spouse_length_of_employment',
                'spouse_annual_salary',
                'spouse_monthly_salary',
                'spouse_employer_telephone',
                'spouse_employer_address',
                'spouse_job_title',
                'spouse_employer',
                'spouse_email',
                'spouse_mobile_telephone',
                'spouse_residence_telephone',
                'spouse_current_address',
                'spouse_drivers_license',
                'spouse_social_security',
                'spouse_birth_place',
                'spouse_dob',
                'spouse_full_name',
                'education',
                'length_of_employment',
                'annual_salary',
                'monthly_salary',
                'employer_telephone',
                'employer_address',
                'job_title',
                'employer',
                'email',
                'mobile_telephone',
                'residence_telephone',
                'current_address',
                'birth_place',
                'dob',
                'full_name',
                'case_ground'
            ]);
        });
    }
};
